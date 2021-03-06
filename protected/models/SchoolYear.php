<?php

/**
 * This is the model class for table "school_year".
 *
 * The followings are the available columns in table 'school_year':
 * @property integer $id
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 */
class SchoolYear extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SchoolYear the static model class
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
		return 'school_year';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, start_date, end_date', 'required'),
			array('description', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, start_date, end_date', 
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
			'class_sessions' => array(self::HAS_MANY, 'ClassSession', 'school_year_id'),
			'school_calendars' => array(self::HAS_MANY, 'SchoolCalendar', 'school_year_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'description' => 'Description',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
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

		$criteria->compare('description',$this->description,true);

		$criteria->compare('start_date',$this->start_date,true);

        $criteria->compare('end_date',$this->end_date,true);


		return new CActiveDataProvider('SchoolYear', array(
			'criteria'=>$criteria,
		));
	}
}