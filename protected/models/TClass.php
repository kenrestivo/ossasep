<?php

/**
 * This is the model class for table "t_class".
 *
 * The followings are the available columns in table 't_class':
 * @property integer $id
 * @property string $class_name
 * @property string $description
 * @property integer $min_grade_allowed
 * @property integer $max_grade_allowed
 * @property string $dates_times
 * @property string $cost
 * @property integer $max_students
 */
class TClass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TClass the static model class
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
		return 't_class';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('class_name, min_grade_allowed, max_grade_allowed', 'required'),
			array('min_grade_allowed, max_grade_allowed, max_students', 'numerical', 'integerOnly'=>true),
			array('class_name', 'length', 'max'=>128),
			array('dates_times', 'length', 'max'=>256),
			array('cost', 'length', 'max'=>19),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, class_name, description, min_grade_allowed, max_grade_allowed, dates_times, cost, max_students', 'safe', 'on'=>'search'),
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
			'class_name' => 'Class Name',
			'description' => 'Description',
			'min_grade_allowed' => 'Min Grade Allowed',
			'max_grade_allowed' => 'Max Grade Allowed',
			'dates_times' => 'Dates Times',
			'cost' => 'Cost',
			'max_students' => 'Max Students',
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

		$criteria->compare('description',$this->description,true);

		$criteria->compare('min_grade_allowed',$this->min_grade_allowed);

		$criteria->compare('max_grade_allowed',$this->max_grade_allowed);

		$criteria->compare('dates_times',$this->dates_times,true);

		$criteria->compare('cost',$this->cost,true);

		$criteria->compare('max_students',$this->max_students);

		return new CActiveDataProvider('TClass', array(
			'criteria'=>$criteria,
		));
	}
}