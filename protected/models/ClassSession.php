<?php

/**
 * This is the model class for table "class_session".
 *
 * The followings are the available columns in table 'class_session':
 * @property integer $id
 * @property integer $school_year_id
 * @property string $start_date
 * @property string $end_date
 * @property string $registration_starts
 * @property string $description
 * @property integer $public
 */
class ClassSession extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ClassSession the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'class_session';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_year_id, public,description, start_date, end_date', 
			      'required'),
			array('school_year_id, public', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>128),
			array('registration_starts', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, school_year_id, public, registration_starts, description, start_date, end_date', 
			      'safe', 'on'=>'search'),
			);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'classes' => array(
				self::HAS_MANY, 
				'ClassInfo', 
				'session_id',
				'order' => 'class_name'), 
			'school_year' => array(self::BELONGS_TO, 'SchoolYear', 'school_year_id'),
			'active_classes' => array(
				self::HAS_MANY, 
				'ClassInfo', 
				'session_id',
				'condition' => "(status = 'Active' or status = 'New')",
				'order' => 'class_name'), 
			'cancelled_classes' => array(
				self::HAS_MANY, 
				'ClassInfo', 
				'session_id',
				'condition' => "status = 'Cancelled'",
				'order' => 'class_name'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */

	public function getSummary(){
		return sprintf(
			'Session %s %s', 
			$this->description,
			$this->school_year->description);
 
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'start_date' => 'Start Date',
			'registration_starts' => 'Registration Starts',
			'end_date' => 'End Date',
			'school_year_id' => 'School Year',
			'description' => 'Description',
			'public' => "Show this session publicly",
			);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('school_year_id',$this->school_year_id);

		$criteria->compare('start_date',$this->start_date,true);

		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('registration_starts',$this->registration_starts,true);

		$criteria->compare('public',$this->public,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('ClassSession', array(
						       'criteria'=>$criteria,
						       ));
	}

	public static function savedSessionId()
	{
		/// HACK! only admins get to save sessions. Everyone else gets this!
		if(Yii::app()->user->name != 'admin'){
			$lp=self::lastPublic();
			if(isset($lp)){
				return self::lastPublic()->id;
			} else {
				// XXX this is stupid
				return self::sessionByDate()->id;
			}
		}

		// fallthru for admins
		if(!isset(Yii::app()->session['saved_session_id'])){
			Yii::app()->session['saved_session_id'] = self::sessionByDate()->id;
		}
		return Yii::app()->session['saved_session_id'];
	}


	/*
	  This sets the (confusing terminology) session for the session. Wha?
	  It sets the cookie (user browser session) storing the ClassSession->id !
	*/
	public static function setSessionId($id)
	{
		Yii::app()->session['saved_session_id'] =  $id;
	}


	/*
	  Picks the earliest class session that has not ended yet.
	  That'll be the current one, until that one ends, then it'll be the next.
	  If there are no sessions, picks the last session.
	  You can give it a date to check what would be the current session 
	  for a particular date.
	  This returns a session object.
	*/
	public static function sessionByDate($date = null)
	{
		if(!isset($date)){
			$date = date('Y-m-d');
		}
		$ret =  self::model()->findBySql(
			"select class_session.* from class_session 
            where end_date >= :date 
            order by start_date asc 
            limit 1",
			array('date' => $date));

		/* cough, hack. Have to have a valid session to log in, even if
		   there are no current sessions (i.e. end of year, between sessions).
		*/
		if(!isset($ret)){
			$ret =  self::model()->findBySql(
				"select class_session.* from class_session 
            order by start_date desc 
            limit 1");
		}
		return $ret;
	}

/*
  Finds the LAST class session that is not ended yet and is public.
  This means, as soon as the session goes public, this will return it,
  even if there is a session already in progress.
*/
	public static function lastPublic()
	{
		return self::model()->findBySql(
			"select class_session.* from class_session 
            where 
                 public > 0
            order by start_date desc
            limit 1");
	}

/*
  TODO: at some point i'll need to make this an ajax dependent dropdown
  and have it select on school year too.
  
  TODO: this also screams for cdbbuilder
*/

	public static function allSessions($public = false)
	{
		$constraint = $public ? "where public > 0" : "";
		$limit = $public ? "limit 2" : "";
		return self::model()->findAllBySql(
			"select class_session.* from class_session 
             $constraint
            order by start_date desc
            $limit
            ");
	}



/*
  Finds recent public sessions. Usually this will just be current and past,
  or current and future if the next session is already public.
  It's in reverse chron, so the freshest will be at the top.

  XXX this is kinda stupid because it's the EXACT same one as above, 
  but returnes > 1 so it's findallbysql

*/
	public static function recentPublic($date = null)
	{
		if(!isset($date)){
			$date = date('Y-m-d');
		}
		return self::model()->findAllBySql(
			"select class_session.* from class_session 
            where end_date >= :date 
                 and public > 0
            order by start_date desc
            limit 2",
			array('date' => $date));
	}


/*
  Finds the LAST class session that was public NOT INCLUDING the saved session.
  This is a miserable hack. This whole session business needs rethinking/cleaning
*/
	public static function previousPublic()
	{
		return self::model()->findBySql(
			"select class_session.* from class_session 
                 where public > 0
                 and id != :currentid   
            order by start_date desc
            limit 1",
			array('currentid' => ClassSession::savedSessionId()));
	}



	/* 
	   Just a utility function, often getting this session! returns obj
	*/
	public static function current()
	{
		$cur = self::model()->findByPk(self::savedSessionId());
		if(isset($cur)){
			return $cur;
		}

		// this should NOT HAPPEN
		trace(Yii::app()->session['saved_session_id']);
		// reset it
		unset(Yii::app()->session['saved_session_id']);
		// recurse, try again!
		return self::current(); 
        
	}


	/* 
	   Only the OSSPTO instructrs.
	   XXX couldn't this be done through AR with a through => classes??
	   what about the sorts though. hmm.
	*/
	public function getOsspto_Instructors()
	{
		return Instructor::model()->findAllBySql(
			"select instructor.* from instructor 
left join instructor_assignment
   on instructor.id = instructor_assignment.instructor_id 
left join class_info on class_info.id = instructor_assignment.class_id
where class_info.session_id = :sid
and instructor.instructor_type_id != :type
group by instructor_id
order by instructor.last_name asc, instructor.first_name asc",
			array('sid' => $this->id,
			      'type' => InstructorType::COMPANY_TYPE,
				));

	}


/*
  ALL current instructors, no matter what their company is
*/
	public function getInstructors()
	{
		return Instructor::model()->findAllBySql(
			"select instructor.* from instructor 
left join instructor_assignment
   on instructor.id = instructor_assignment.instructor_id 
left join class_info on class_info.id = instructor_assignment.class_id
where class_info.session_id = :sid
group by instructor_id
order by instructor.last_name asc, instructor.first_name asc",
			array('sid' => $this->id,
				));

	}
    
	/*
	  Returns an array[month][day] = count of classes for that day
	*/

	public function getMeeting_summary()
	{
		$dates = array();
		foreach($this->active_classes as $c){ 
			$ms = $c->meeting_summary; 
			foreach($ms as $m => $days){ 
				foreach($days as $d){
					if(array_key_exists($m, $dates) &&
					   array_key_exists($d, $dates[$m])){
						$dates[$m][$d]++;
					} else {
						$dates[$m][$d] = 1;
					}
				}
			}
		}
		return ($dates);

	}
}