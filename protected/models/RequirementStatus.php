<?php

/**
 * This is the model class for table "requirement_status".
 *
 * The followings are the available columns in table 'requirement_status':
 * @property integer $instructor_id
 * @property integer $requirement_type_id
 * @property string $received
 * @property string $expired
 */
class RequirementStatus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RequirementStatus the static model class
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
		return 'requirement_status';
	}
    public function primaryKey(){
        return array('instructor_id','requirement_type_id');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('instructor_id, requirement_type_id', 'required'),
			array('instructor_id, requirement_type_id', 'numerical', 'integerOnly'=>true),
			array('received, expired', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('instructor_id, requirement_type_id, received, expired', 'safe', 'on'=>'search'),
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
			'requirement_type_id' => 'Requirement Type',
			'received' => 'Received',
			'expired' => 'Expired',
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

		$criteria->compare('requirement_type_id',$this->requirement_type_id);

		$criteria->compare('received',$this->received,true);

		$criteria->compare('expired',$this->expired,true);

		return new CActiveDataProvider('RequirementStatus', array(
			'criteria'=>$criteria,
		));
	}
}