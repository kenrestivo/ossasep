<?php

/**
 * This is the model class for table "instructor_assignment".
 *
 * The followings are the available columns in table 'instructor_assignment':
 * @property integer $instructor_id
 * @property integer $class_id
 * @property string $percentage
 */
class InstructorAssignment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return InstructorAssignment the static model class
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
		return 'instructor_assignment';
	}
    public function primaryKey(){
        return array('instructor_id','class_id');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('instructor_id, class_id, percentage', 'required'),
			array('instructor_id, class_id', 'numerical', 'integerOnly'=>true),
			array('percentage', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('instructor_id, class_id, percentage', 'safe', 'on'=>'search'),
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
			'instructor_id' => 'Instructor',
			'class_id' => 'Class',
			'percentage' => 'Percentage',
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

		$criteria->compare('instructor_id',$this->instructor_id);

		$criteria->compare('class_id',$this->class_id);

		$criteria->compare('percentage',$this->percentage,true);

		return new CActiveDataProvider('InstructorAssignment', array(
			'criteria'=>$criteria,
		));
	}
}