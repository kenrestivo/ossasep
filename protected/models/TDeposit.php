<?php

/**
 * This is the model class for table "t_deposit".
 *
 * The followings are the available columns in table 't_deposit':
 * @property integer $id
 * @property string $amount
 * @property string $deposit_date
 */
class TDeposit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TDeposit the static model class
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
		return 't_deposit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount, deposit_date', 'required'),
			array('amount', 'length', 'max'=>19),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, deposit_date', 'safe', 'on'=>'search'),
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
			'amount' => 'Amount',
			'deposit_date' => 'Deposit Date',
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

		$criteria->compare('deposit_date',$this->deposit_date,true);

		return new CActiveDataProvider('TDeposit', array(
			'criteria'=>$criteria,
		));
	}
}