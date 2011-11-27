<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $grade
 * @property string $emergency_1
 * @property string $emergency_2
 * @property string $emergency_3
 * @property string $parent_email
 */
class Student extends CActiveRecord
{


    public function getFull_name()
        {
                return $this->first_name.' '.$this->last_name;
        }

	/**
	 * Returns the static model of the specified AR class.
	 * @return Student the static model class
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
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, grade, emergency_1', 'required'),
			array('grade', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>128),
			array('emergency_1, emergency_2, emergency_3, parent_email, note', 'length', 'max'=>256),
            array('note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name, grade, emergency_1, emergency_2, emergency_3, parent_email', 'safe', 'on'=>'search'),
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
			'incomes' => array(self::HAS_MANY, 'Income', 'student_id'),
			'class_infos' => array(
                self::HAS_MANY, 
                'ClassInfo', 
                'class_id', 
                'through' => 'signups'),
			'signups' => array(self::HAS_MANY, 'Signup', 'student_id'),
			'checks' => array(
                self::HAS_MANY, 
                'CheckIncome', 
                'check_id',
                'incomes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'grade' => 'Grade',
			'emergency_1' => 'Emergency 1',
			'emergency_2' => 'Emergency 2',
			'emergency_3' => 'Emergency 3',
            'parent_email' => 'Parent Email',
	        'note' => 'Admin Private Note',
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

		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->first_name,true);

		$criteria->compare('grade',$this->grade);

		$criteria->compare('emergency_1',$this->emergency_1,true);

		$criteria->compare('emergency_2',$this->emergency_2,true);

		$criteria->compare('emergency_3',$this->emergency_3,true);

		$criteria->compare('parent_email',$this->parent_email,true);

		return new CActiveDataProvider('Student', array(
			'criteria'=>$criteria,
		));
	}
}