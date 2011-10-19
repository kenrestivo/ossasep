<?php

/**
 * This is the model class for table "t_student".
 *
 * The followings are the available columns in table 't_student':
 * @property integer $id
 * @property string $full_name
 * @property integer $grade
 * @property string $emergency_1
 * @property string $emergency_2
 * @property string $emergency_3
 */
class TStudent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TStudent the static model class
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
		return 't_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('full_name, grade, emergency_1', 'required'),
			array('grade', 'numerical', 'integerOnly'=>true),
			array('full_name', 'length', 'max'=>128),
			array('emergency_1, emergency_2, emergency_3', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, full_name, grade, emergency_1, emergency_2, emergency_3', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'full_name' => 'Full Name',
			'grade' => 'Grade',
			'emergency_1' => 'Emergency 1',
			'emergency_2' => 'Emergency 2',
			'emergency_3' => 'Emergency 3',
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

		$criteria->compare('full_name',$this->full_name,true);

		$criteria->compare('grade',$this->grade);

		$criteria->compare('emergency_1',$this->emergency_1,true);

		$criteria->compare('emergency_2',$this->emergency_2,true);

		$criteria->compare('emergency_3',$this->emergency_3,true);

		return new CActiveDataProvider('TStudent', array(
			'criteria'=>$criteria,
		));
	}
}