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
   * @property string $description
   * @property string $cost_per_class
   * @property integer $max_students
   * @property integer $min_students
   * @property integer $day_of_week
   * @property string $location
   * @property integer $status
   * @property integer $session_id
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


    /*
      includes fees AND the cost per class times class meetings
     */

    public function total_cost(){

        $total = (float)$this->cost_per_class * count($this->class_meetings);
        foreach($this->extra_fees as $e){
            $total += $e->amount;
        }
        return($total);
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'class_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_name, session_id', 'required'),
			array('min_grade_allowed, max_grade_allowed, day_of_week, min_students, max_students, session_id', 'numerical', 'integerOnly'=>true),
			array('class_name', 'length', 'max'=>128),
			array('cost_per_class', 'length', 'max'=>19),
			array('cost_per_class', 'numerical'),
			array(' status', 'length', 'max'=>100),
			array(' min_grade_allowed,max_grade_allowed,min_students,max_students', 'length', 'max'=>3),
            //TODO: check that the value is valid for the enum
			array('location, note', 'length', 'max'=>256),
			array('start_time, end_time, description, note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, class_name, min_grade_allowed, max_grade_allowed, start_time, end_time, description, cost_per_class, max_students, min_students, day_of_week, location, status, session_id', 'safe', 'on'=>'search'),
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
			'session' => array(self::BELONGS_TO, 'ClassSession', 'session_id',
                'order' => 'start_date'),
			'class_meetings' => array(self::HAS_MANY, 'ClassMeeting', 'class_id'),
			'extra_fees' => array(self::HAS_MANY, 'ExtraFee', 'class_id'),
			'incomes' => array(
                self::HAS_MANY, 
                'Income', 
                'class_id'),
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
                'class_id'),
			'students' => array(
                self::HAS_MANY, 
                'Student', 
                'student_id',
                'through' => 'signups'),
			'instructor_assignments' => array(
                self::HAS_MANY, 'InstructorAssignment', 'class_id'),
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
			'description' => 'Description',
			'cost_per_class' => 'Cost Per Class',
			'min_students' => 'Min Students',
			'max_students' => 'Max Students',
			'day_of_week' => 'Day Of Week',
			'location' => 'Location',
			'status' => 'Status',
            'note' => 'Admin Private Note',
			'session_id' => 'Session',
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

		$criteria->compare('description',$this->description,true);

		$criteria->compare('cost_per_class',$this->cost_per_class,true);

		$criteria->compare('max_students',$this->max_students);
		$criteria->compare('min_students',$this->max_students);

		$criteria->compare('day_of_week',$this->day_of_week);

		$criteria->compare('location',$this->location,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('session_id',$this->session_id);

		return new CActiveDataProvider('ClassInfo', array(
                                           'criteria'=>$criteria,
                                           ));
	}


    public function populate_meetings(){

        $model = $this;

        $c = Yii::app()->db->createCommand(
            "select school_day from school_calendar where day_off = false and minimum = false and dayofweek(school_day) = :dayofweek and school_day > :startdate  and school_day < :enddate");
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

}