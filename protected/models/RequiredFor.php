<?php

/**
 * This is the model class for table "required_for".
 *
 * The followings are the available columns in table 'required_for':
 * @property integer $instructor_type_id
 * @property integer $requirement_type_id
 */
class RequiredFor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RequiredFor the static model class
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
		return 'required_for';
	}

    public function primaryKey(){
        return array('instructor_type_id', 'requirement_type_id');
    }
       

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('instructor_type_id, requirement_type_id', 'required'),
			array('instructor_type_id, requirement_type_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('instructor_type_id, requirement_type_id', 'safe', 'on'=>'search'),
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
			'instructor_type' => array(self::BELONGS_TO, 
                                       'InstructorType', 
                                       'instructor_type_id'),
			'requirement_type' => array(self::BELONGS_TO, 
                                        'RequirementType', 
                                        'requirement_type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'instructor_type_id' => 'Instructor Type',
			'requirement_type_id' => 'Requirement Type',
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

		$criteria->compare('instructor_type_id',$this->instructor_type_id);

		$criteria->compare('requirement_type_id',$this->requirement_type_id);

		return new CActiveDataProvider('RequiredFor', array(
			'criteria'=>$criteria,
		));
	}
}