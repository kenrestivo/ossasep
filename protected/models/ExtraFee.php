<?php

/**
 * This is the model class for table "extra_fee".
 *
 * The followings are the available columns in table 'extra_fee':
 * @property integer $id
 * @property string $amount
 * @property string $description
 * @property integer $class_id
 */
class ExtraFee extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ExtraFee the static model class
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
		return 'extra_fee';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, description, class_id', 'required'),
			array('class_id,pay_to_instructor', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>19),
			array('description', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, description, pay_to_instructor, class_id', 'safe', 'on'=>'search'),
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
			'amount' => 'Amount',
			'description' => 'Description',
			'pay_to_instructor' => "Pay to instructor?",
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

		$criteria->compare('amount',$this->amount,true);

		$criteria->compare('description',$this->description,true);
		$criteria->compare('pay_to_instructor',$this->pay_to_instructor,true);

		$criteria->compare('class_id',$this->class_id);

		return new CActiveDataProvider('ExtraFee', array(
			'criteria'=>$criteria,
		));
	}
}