<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $id
 * @property string $name
 * @property string $use_publicly
 */
class Company extends CActiveRecord
{
    /* NOTE! this is very important for stuff like classes which 
       link to company but do not really have an instructor type
       the OSSPTO COMPANY 1, id 1, is magical and special.
     */
    const OSSPTO_COMPANY = 1;

	/**
	 * Returns the static model of the specified AR class.
	 * @return Company the static model class
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
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
            array('use_publicly', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, use_publicly', 'safe', 'on'=>'search'),
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
			'check_incomes' => array(self::HAS_MANY, 'CheckIncome', 'payee_id'),
			'instructors' => array(self::HAS_MANY, 'Instructor', 'company_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
            'use_publicly' => "Show Company Name In Descriptions",
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

		$criteria->compare('name',$this->name,true);
		$criteria->compare('use_publicly',$this->use_publicly,true);

		return new CActiveDataProvider('Company', array(
			'criteria'=>$criteria,
		));
	}

    function getIncomes()
    {
        return Income::model()->findAllBySql(
            "select income.*
from income
left join check_income 
   on income.check_id = check_income.id
where check_income.payee_id = :id
order by check_income.check_num asc",
            array('id' => $this->id));
    }

    function getClasses()
    {
        return ClassInfo::model()->findAllBySql(
            "select class_info.*
from class_info
left join instructor_assignment
   on instructor_assignment.class_id = class_info.id
left join instructor
   on instructor_assignment.instructor_id = instructor.id
where instructor.company_id = :id
order by instructor.full_name asc",
            array('id' => $this->id));

    }

}