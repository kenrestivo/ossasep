<?php

/**
 * This is the model class for table "class_meeting".
 *
 * The followings are the available columns in table 'class_meeting':
 * @property integer $id
 * @property string $meeting_date
 * @property string $note
 * @property integer $class_id
 */
class ClassMeeting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ClassMeeting the static model class
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
		return 'class_meeting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('meeting_date, note, class_id', 'required'),
			array('class_id', 'numerical', 'integerOnly'=>true),
			array('note', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, meeting_date, note, class_id', 'safe', 'on'=>'search'),
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
			'class' => array(self::BELONGS_TO, 'ClassInfo', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'meeting_date' => 'Meeting Date',
			'note' => 'Note',
			'class_id' => 'Class',
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

		$criteria->compare('meeting_date',$this->meeting_date,true);

		$criteria->compare('note',$this->note,true);

		$criteria->compare('class_id',$this->class_id);

		return new CActiveDataProvider('ClassMeeting', array(
			'criteria'=>$criteria,
		));
	}
}