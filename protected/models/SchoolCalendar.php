<?php

/**
 * This is the model class for table "school_calendar".
 *
 * The followings are the available columns in table 'school_calendar':
 * @property integer $id
 * @property string $school_day
 * @property integer $day_off
 * @property integer $minimum
 * @property integer $school_year_id
 * @property string $note
 */
class SchoolCalendar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SchoolCalendar the static model class
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
		return 'school_calendar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_day, day_off, school_year_id', 'required'),
			array('day_off, minimum, school_year_id', 'numerical', 'integerOnly'=>true),
			array('note', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, school_day, day_off, minimum, school_year_id, note', 'safe', 'on'=>'search'),
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
			'school_year' => array(self::BELONGS_TO, 'SchoolYear', 'school_year_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'school_day' => 'School Day',
			'day_off' => 'Day Off',
			'minimum' => 'Minimum',
			'school_year_id' => 'School Year',
			'note' => 'Note',
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

		$criteria->compare('school_day',$this->school_day,true);

		$criteria->compare('day_off',$this->day_off);

		$criteria->compare('minimum',$this->minimum);

		$criteria->compare('school_year_id',$this->school_year_id);

		$criteria->compare('note',$this->note,true);

		return new CActiveDataProvider('SchoolCalendar', array(
			'criteria'=>$criteria,
		));
	}
}