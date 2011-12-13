<?php

/**
 * This is the model class for table "instructor_type".
 *
 * The followings are the available columns in table 'instructor_type':
 * @property integer $id
 * @property string $description
 */
class InstructorType extends CActiveRecord
{

    // NOTE! these must be set in the db too
    const PARENT_TYPE = 1;
    const TEACHER_TYPE = 2;
    const COMPANY_TYPE = 3;
    const INDIVIDUAL_TYPE = 4;


  public function behaviors(){
          return array( 'CAdvancedArBehavior' => array(
         	 'class' => 'application.extensions.CAdvancedArBehavior')); 
  }                                  

	/**
	 * Returns the static model of the specified AR class.
	 * @return InstructorType the static model class
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
		return 'instructor_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('description', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description', 'safe', 'on'=>'search'),
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
			'instructors' => array(self::HAS_MANY, 'Instructor', 'instructor_type_id'),
			'requirements' => array(
                self::MANY_MANY, 
                'RequirementType', 
                'required_for(instructor_type_id, requirement_type_id)'),

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

		return new CActiveDataProvider('InstructorType', array(
			'criteria'=>$criteria,
		));
	}
}