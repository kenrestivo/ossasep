<?php

/**
 * This is the model class for table "class_info".
 *
 * The followings are the available columns in table 'class_info':
 * @property integer $id
 * @property string $class_name
 * @property integer $min_grade_allowed
 * @property integer $max_grade_allowed
 * @property string $start_time
 * @property string $end_time
 * @property string $cost_per_class
 * @property integer $max_students
 * @property integer $min_students
 * @property integer $day_of_week
 * @property string $location
 * @property integer $status
 * @property integer $session_id
 * @property integer $company_id
 */
class ClassInfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ClassInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getIs_company()
    {
        return $this->company_id != Company::OSSPTO_COMPANY;
    }


    public function getSummary()
    {
        return $this->class_name . " (" . $this->gradeSummary('short'). ")";
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'class_info';
	}

    public function defaultScope() {
        return array(
            'condition' => 'session_id = ' . ClassSession::savedSessionId(),
            'order' => 'class_name ASC');
    }


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_name, session_id, company_id', 'required'),
			array('min_grade_allowed, max_grade_allowed, day_of_week, min_students, max_students, session_id, company_id', 'numerical', 'integerOnly'=>true),
			array('class_name', 'length', 'max'=>128),
			array('cost_per_class', 'length', 'max'=>19),
			array('cost_per_class', 'numerical'),
			array(' status', 'length', 'max'=>100),
			array(' min_grade_allowed,max_grade_allowed,min_students,max_students', 'length', 'max'=>3),
            //TODO: check that the value is valid for the enum
			array('location, note', 'length', 'max'=>256),
			array('start_time, end_time, note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, class_name, min_grade_allowed, max_grade_allowed, start_time, end_time, cost_per_class, max_students, min_students, day_of_week, location, status, session_id, company_id', 'safe', 'on'=>'search'),
            array('session_id','default',
                  'value'=> ClassSession::savedSessionId(),
                  'setOnEmpty'=>true,
                  'on'=>'insert'),
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
			'session' => array(
                self::BELONGS_TO,
                'ClassSession', 
                'session_id',
                'order' => 'start_date'),
			'meetings' => array(
                self::HAS_MANY,
                'ClassMeeting', 
                'class_id'),
			'active_meetings' => array(
                self::HAS_MANY, 
                'ClassMeeting', 
                'class_id',
                'condition' => 'makeup < 1'), 
			'makeup_days' => array(
                self::HAS_MANY, 
                'ClassMeeting', 
                'class_id',
                'condition' => 'makeup > 0'), 
			'noted_meetings' => array(
                self::HAS_MANY, 
                'ClassMeeting', 
                'class_id',
                'condition' => '(note is not null and note != "")'), 
			'extra_fees' => array(self::HAS_MANY, 'ExtraFee', 'class_id'),
			'class_descriptions' => array(self::HAS_MANY, 'ClassDescription', 'class_id'),
			'incomes' => array(
                self::HAS_MANY, 
                'Income', 
                'class_id',
                /* XXX i'm worried about deep loops with this,
                   so, not using it.
                   'with' => 'check',
                   'order' => 'abs(check.check_num) asc'
                */
                ),
            'checks' => array(
                self::HAS_MANY, 
                'CheckIncome', 
                'check_id',
                'through' => 'incomes'),
            'instructors' => array(
                self::HAS_MANY, 
                'Instructor', 
                'instructor_id',
                'through' => 'instructor_assignments'),
			'signups' => array(
                self::HAS_MANY, 
                'Signup', 
                'class_id'
                ),
			'students' => array(
                self::HAS_MANY, 
                'Student', 
                'student_id',
                'through' => 'signups'),
			'instructor_assignments' => array(
                self::HAS_MANY, 'InstructorAssignment', 'class_id'),
			'company' => array(
                self::BELONGS_TO, 
                'Company', 
                'company_id',
                'order' => 'name'),
            'active_mtg_count' => array(
                self::STAT, 
                'ClassMeeting', 'class_id',
                'condition' => 'makeup < 1'), 
            'makeup_day_count' => array(
                self::STAT, 
                'ClassMeeting', 'class_id',
                'condition' => 'makeup > 0'), 
            'enrolled_count' => array(
                self::STAT, 
                'Signup', 'class_id',
                'condition' => 'status = "Enrolled"'), 
            'waitlist_count' => array(
                self::STAT, 
                'Signup', 'class_id',
                'condition' => 'status = "Waitlist"'), 
            'cancelled_count' => array(
                self::STAT, 
                'Signup', 'class_id',
                'condition' => 'status = "Cancelled"'), 
            'owed_count' => array(
                self::STAT, 
                'Signup', 'class_id',
                'condition' => 'status = "Enrolled" and scholarship  < 1'), 
            'scholarships_count' => array(
                self::STAT, 
                'Signup', 'class_id',
                'condition' => 'scholarship > 0 and status != "Cancelled"'), 
            );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'class_name' => 'Class Name',
			'min_grade_allowed' => 'Min Grade Allowed',
			'max_grade_allowed' => 'Max Grade Allowed',
			'start_time' => 'Start Time',
			'end_time' => 'End Time',
			'cost_per_class' => 'Cost Per Class',
			'min_students' => 'Min Students',
			'max_students' => 'Max Students',
			'day_of_week' => 'Day Of Week',
			'location' => 'Location',
			'status' => 'Status',
            'note' => 'Admin Private Note',
			'session_id' => 'Session',
			'company_id' => 'Company',
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

		$criteria->compare('class_name',$this->class_name,true);

		$criteria->compare('min_grade_allowed',$this->min_grade_allowed);

		$criteria->compare('max_grade_allowed',$this->max_grade_allowed);

		$criteria->compare('start_time',$this->start_time,true);

		$criteria->compare('end_time',$this->end_time,true);

		$criteria->compare('cost_per_class',$this->cost_per_class,true);

		$criteria->compare('max_students',$this->max_students);
		$criteria->compare('min_students',$this->max_students);

		$criteria->compare('day_of_week',$this->day_of_week);

		$criteria->compare('location',$this->location,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('session_id',$this->session_id);
		$criteria->compare('company_id',$this->company_id);

		return new CActiveDataProvider('ClassInfo', array(
                                           'criteria'=>$criteria,
                                           ));
	}


    public function populate_meetings($count){

        $model = $this;
        ///XXX hack! have to inject the count directly since it won't substitute!
        $c = Yii::app()->db->createCommand(
            "select school_day from school_calendar where day_off < 1 and minimum < 1 and dayofweek(school_day) = :dayofweek and school_day >= :startdate  and school_day <= :enddate limit $count");
        $r=$c->queryAll(true, array(
                            'dayofweek' => $model->day_of_week,
                            'startdate' => $model->session->start_date,
                            'enddate' => $model->session->end_date,
                            ));
        foreach ($r as $i => $d)
        {
            $sc = new ClassMeeting();
            $sc->meeting_date = $d['school_day'];
            $sc->class_id = $model->id;
            // TODO: trap errors here somehow
            $sc->save();
        }

    }

    static public function findAllWeekdays($weekdays, $session)
    {

        $classes = array();
        // only weekdays, no sat/sun
        foreach($weekdays as $n){
            // XXX the current session is hardcoded in here!
            // needs to be defaulted programatically and saved in cookie!
            foreach(ClassInfo::model()->findAllBySql(
                        "select class_info.* 
from class_info
where class_info.day_of_week = :wkd
      and class_info.session_id = :sess
order by class_info.class_name
; ",
                        array('wkd' => $n,
                              'sess' => $session))
                    as $c)
            {
                $classes[$n][] = $c;
            }
        }
        return $classes;
    }



    public function getCostSummary()
    {

        $total =  $this->active_mtg_count  * $this->cost_per_class;

        foreach($this->extra_fees as $f){
            $total += $f->amount;
        }
        return $total;
    }


    public function instructorNames($delim)
    {
        return implode($delim, 
                       array_map(
                           function($i) { return $i->public_name ; },
                           $this->instructors
                           ));
    }


/*
  In magic order based on the enum: enrolled, waitlist, then cancelled
*/

    public function getSortedSignups()
    {
        return  Signup::model()->findAllBySql(
            "select signup.*
       from signup
       left join student on student.id = signup.student_id
      where signup.class_id = :cid
      order by status ASC, student.first_name ASC, student.last_name ASC
      ",
            array('cid' => $this->id));
    }

    /*
      Shows the cancelled first, then waitlist
    */
    public function getSortedCancelled()
    {
        return  Signup::model()->findAllBySql(
            "select signup.*
       from signup
       left join student on student.id = signup.student_id
      where signup.class_id = :cid
      order by FIND_IN_SET(status, 'Enrolled,Cancelled,Waitlist'), 
        signup.signup_date asc, student.last_name ASC, student.first_name ASC
      ",
            array('cid' => $this->id));
    }

    /*
      Shows the cancelled first, then waitlist
    */
    public function getSortedNoCancelled()
    {
        return  Signup::model()->findAllBySql(
            "select signup.*
       from signup
       left join student on student.id = signup.student_id
      where signup.class_id = :cid
      and signup.status != 'Cancelled'
      order by FIND_IN_SET(status, 'Enrolled,Waitlist'), 
        signup.signup_date asc, student.last_name ASC, student.first_name ASC
      ",
            array('cid' => $this->id));
    }



    public function getFull()
    {
        return $this->enrolled_count >= $this->max_students;
    }


    public function getSummaryCounts()
    {
        $sum = "";
        $c = $this->enrolled_count;
        if($c >= $this->max_students){
            $sum .= "CLASS FULL: ";
        }
        if($c > 0){
            $sum .= "$c  enrolled";
        }

        $c = $this->waitlist_count;
        if($c > 0){
            $sum .= ", $c  waitlisted";
        }

        $c = $this->scholarships_count;
        if($c > 0){
            $sum .= ", $c  scholarship";
            $sum .= $c > 1 ? 's' : '';
        }

        $c = $this->cancelled_count;
        if($c > 0){
            $sum .= ", $c  cancelled";
        }
        return $sum;
    }


    public function getDays_off()
    {
        return SchoolCalendar::model()->findAllBySql(
            "select school_calendar.school_day
from school_calendar
left join class_meeting 
     on school_calendar.school_day = class_meeting.meeting_date
        and class_meeting.class_id = :cid
where school_calendar.school_day > :start
      and school_calendar.school_day < 
      (select max(class_meeting.meeting_date)
             from class_meeting
             where class_meeting.makeup < 1
                   and class_meeting.class_id = :cid)
      and dayofweek(school_calendar.school_day) = :wkday
      and class_meeting.meeting_date is null",
            array('start' => $this->session->start_date,
                  'wkday' => $this->day_of_week,
                  'cid' => $this->id,
                )
            );
    }

    public function gradeSummary($style="long")
    {
        if($style == "long"){
            return Yii::app()->format->grade($this->min_grade_allowed) .'  - '. Yii::app()->format->grade($this->max_grade_allowed);
        } else {
            return Yii::app()->format->gradeShort($this->min_grade_allowed) .'-'. Yii::app()->format->gradeShort($this->max_grade_allowed);
        }
    }


    public function getInstructor_percent()
    {
        $c = Yii::app()->db->createCommand(
            "select sum(instructor_assignment.percentage) as total from instructor_assignment
where class_id = :cid");
        $r=$c->queryRow(true, array('cid' => $this->id));
        return (int)$r['total'];
    }


    public function getInstructor_discrepancy()
    {
        return 100 - $this->instructor_percent;
    }

/*
  This is everything paid by the parents, refunds excluded
*/

    public function getPaid()
    {
        $c = Yii::app()->db->createCommand(
            "select sum(income.amount) as total
from income
left join check_income
     on check_income.id = income.check_id
where (check_income.returned is null
        or check_income.returned < '1999-01-01')
      and income.class_id = :cid
group by income.class_id");
        $r=$c->queryRow(true, array('cid' => $this->id));
        return $r['total'];
    }

/*
  Everything paid, minus refunds, and minus any fees paid by currently enrolled kids.
*/

    public function getPaidMinusFees()
    {
        $c = Yii::app()->db->createCommand(
			"
        select (sum(income_summary.total_paid_pto_fees) -
               sum(signup_with_non_instructor_fees.non_instructor_total))
              as total_paid_minus_pto_fees,
             income_summary.class_id as class_id
from
        (select sum(income.amount)
              as total_paid_pto_fees, income.student_id,
             income.class_id as class_id
            from income
            left join check_income
                 on check_income.id = income.check_id
            left join class_info
                 on class_info.id = income.class_id
            where (check_income.returned is null
                    or check_income.returned < '1999-01-01')
                  and income.class_id = :cid
		   group by income.student_id)
          as income_summary
 left join
                  (select signup.class_id, signup.status, signup.student_id,
 				  		  ifnull(non_instructor_fees.amount,0) as non_instructor_total 
                           from signup
                            left join 
                              (select sum(extra_fee.amount) as amount, extra_fee.class_id as class_id
                                                 from extra_fee
                                                  where extra_fee.pay_to_instructor < 1
                                                   group by extra_fee.class_id)
                            as non_instructor_fees
                             on non_instructor_fees.class_id = signup.class_id)
					as signup_with_non_instructor_fees
                on (signup_with_non_instructor_fees.class_id = income_summary.class_id
                    and signup_with_non_instructor_fees.student_id = income_summary.student_id)");
        $r=$c->queryRow(true, array('cid' => $this->id));
        return $r['total_paid_minus_pto_fees'];
    }




/*
  Returned check portions for this class.
*/

    public function getReturned()
    {
        $c = Yii::app()->db->createCommand(
            "select sum(income.amount) as total
from income
left join check_income
     on check_income.id = income.check_id
where (check_income.returned > '1999-01-01')
      and income.class_id = :cid");
        $r=$c->queryRow(true, array('cid' => $this->id));
        return $r['total'];
    }

    /*
      Not yet paid by parents.

    */
    public function getOwed()
    {
        return ($this->costSummary * $this->owed_count) - $this->paid;
    }



    public function getSignup_status()
    {
        $count = $this->enrolled_count;
        if($this->active_mtg_count < 1){
            return 'No meeting dates!';
        } elseif($count < 1){
            return 'No signups yet.';
        } elseif($count < $this->min_students){
            return 'Needs '. ($this->min_students - $this->enrolled_count) . ' more student(s)';
        } elseif($count >= $this->max_students){
            return 'Full';
        } else {
            return'OK';
        }

    }

    public function getUnbalanced_instructors()
    {
        $c = Yii::app()->db->createCommand(
            "select sum(instructor_assignment.percentage) as total, 
                   instructor_assignment.class_id as class_id
           from instructor_assignment
          where class_id = :cid
           group by instructor_assignment.class_id");
        $r=$c->queryRow(true, array('cid' => $this->id));
        return $r['total'];
    }

    /*
      The summary of dates by month, in order, in an array of month[day] = day
    */
    public function getMeeting_summary()
    {
        $c = Yii::app()->db->createCommand(
            "select month(meeting_date) as m, dayofmonth(meeting_date) as d from class_meeting where class_id = :cid order by meeting_date");
        $roze=$c->queryAll(true, array('cid' => $this->id));
        
        $dates = array();
        foreach($roze as $r){
            $dates[$r['m']][$r['d']] = $r['d']; 
        }
        return $dates;
    }


    public static function copyClass($old_cid, $new_sid)
    {

        $transaction= Yii::app()->db->beginTransaction();
 
        try
        {

            /* XXX I HATE ACTIVERECORD HATE HATE HATE
               this stupid hack required in order to override the "default scope"
               which isn't actually default, it's REQUIRED, 
               there's no way to override it, and all findbypks fail.
            */
            $old= self::model()->findBySql(
                'select class_info.* from class_info where id = :cid', 
                array ('cid' => $old_cid));
            if(!isset($old)){
                return false;
            }
            $new= new self;
        
            $new->attributes = $old->attributes;
            $new->session_id = $new_sid;
            // by default, if i'm copying it, it's not new anymore!
            // and i'll assume it's active
            $new->status = 'Active'; 
        
            if($new->save()){
                foreach($old->instructor_assignments as $oa){
                    $na = new InstructorAssignment;
                    $na->attributes = $oa->attributes;
                    $na->class_id = $new->id;
                    $na->save();
                }
                foreach($old->extra_fees as $of){
                    $nf = new ExtraFee;
                    $nf->attributes = $of->attributes;
                    $nf->class_id = $new->id;
                    $nf->save();
                }            
            }
            $transaction->commit();

        }
        catch(Exception $e)
        {
            $transaction->rollBack();
            // TODO: report the error somehow! flash?
        }
        
        return true;

    }

    /*
      Delete the class, after first deleting its meeting dates and instructors.

	*/
    public function deepDelete()
    {


        $c = Yii::app()->db->createCommand(
			"select count(signup.student_id) + count(income.check_id) as no_no_count
from class_info
left join income
     on income.class_id = class_info.id
left join signup
     on signup.class_id = class_info.id
where class_info.id = :cid");
        $r=$c->queryRow(true, array('cid' => $this->id));
        if($r['no_no_count'] > 0){
            throw new CHttpException(
                400,
                "You cannot delete a class that has signups or payments! You can only change its status to cancelled");
        }

        $transaction= Yii::app()->db->beginTransaction();
        $success = false;
        try
        {
            foreach(
                array(
                    'delete from instructor_assignment where class_id=:cid',
                    'delete from extra_fee where class_id=:cid',
                    'delete from class_description where class_id=:cid',
                    'delete from class_meeting where class_id=:cid'
                    ) as $q){
                $c = Yii::app()->db->createCommand($q);
                $c->execute(array('cid' => $this->id));
            }

            $transaction->commit();
            $success = true;
        }
        catch(Exception $e)
        {
            $transaction->rollBack();
			throw $e;
        }

        // have to do the above before we do this.
        // AND, we can't have it in the transaction, or it will fail.
        // hence, this silly $success flag
        if($success){
            $this->delete();
        }

    }

	// Gets the description for the current language
    // TODO: Move this to the description model instead?
	public function getDescription()
	{
       // TODO: also, use the more yii-ish activerecord means of constraining instead of sql joins
		$found = ClassDescription::model()->findBySql(
			'select class_description.* from class_description
                     where class_id = :cid 
                        and language_id = :lid', 
			array ('cid' => $this->id,
				   'lid' => Language::savedLanguageId()));
		return isset($found) ? 
			$found : 
			ClassDescription::model()->findBySql(
				'select class_description.* from class_description
                     where class_id = :cid 
                        and language_id = :lid', 
				array ('cid' => $this->id,
					   'lid' => Language::DEFAULT_LANGUAGE_ID));
	}
}

