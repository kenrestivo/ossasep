<?php

/**
 * This is the model class for table "check_expense".
 *
 * The followings are the available columns in table 'check_expense':
 * @property integer $id
 * @property string $amount
 * @property string $payer
 * @property string $payee
 * @property integer $check_num
 * @property string $check_date
 */
class CheckExpense extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CheckExpense the static model class
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
		return 'check_expense';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, check_date', 'required'),
			array('check_num', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>19),
			array('payer, payee', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, payer, payee, check_num, check_date', 'safe', 'on'=>'search'),
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
			'instructors' => array(self::MANY_MANY, 'Instructor', 'expense(check_id, instructor_id)'),
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
			'payer' => 'Payer',
			'payee' => 'Payee',
			'check_num' => 'Check Num',
			'check_date' => 'Check Date',
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

		$criteria->compare('payer',$this->payer,true);

		$criteria->compare('payee',$this->payee,true);

		$criteria->compare('check_num',$this->check_num);

		$criteria->compare('check_date',$this->check_date,true);

		return new CActiveDataProvider('CheckExpense', array(
			'criteria'=>$criteria,
		));
	}
}