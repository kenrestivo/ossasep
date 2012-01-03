<?php

/**
 * This is the model class for table "deposit_details".
 *
 * The followings are the available columns in table 'deposit_details':
 * @property integer $id
 * @property string $deposited_date
 * @property string $total_amount
 * @property integer $pennies
 * @property integer $nickels
 * @property integer $dimes
 * @property integer $quarters
 * @property integer $dollar_coins
 * @property integer $ones
 * @property integer $fives
 * @property integer $tens
 * @property integer $twenties
 * @property integer $fifties
 * @property integer $hundreds
 * @property integer $session_id
 */
class DepositDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DepositDetails the static model class
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
		return 'deposit_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('session_id', 'required'),
			array('session_id, pennies, nickels, dimes, quarters, dollar_coins, ones, fives, tens, twenties, fifties, hundreds', 'numerical', 'integerOnly'=>true),
			array('total_amount', 'length', 'max'=>19),
			array('total_amount', 'numerical'),
			array('deposited_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, session_id, deposited_date, total_amount, pennies, nickels, dimes, quarters, dollar_coins, ones, fives, tens, twenties, fifties, hundreds', 'safe', 'on'=>'search'),
            array('session_id','default',
                  'value'=> ClassSession::savedSessionId(),
                  'setOnEmpty'=>true,
                  'on'=>'insert'),
		);
	}

    public function defaultScope() {
        return array(
            'condition' => 'session_id = ' . ClassSession::savedSessionId(),
            'order' => 'deposited_date asc',
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
			'check_incomes' => array(self::HAS_MANY, 'CheckIncome', 'deposit_id'),
			'session' => array(self::BELONGS_TO, 'ClassSession', 'session_id',
                               'order' => 'start_date'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Deposit #',
			'deposited_date' => 'Deposit Submitted Date',
			'total_amount' => 'Total Amount',
			'pennies' => 'Pennies',
			'nickels' => 'Nickels',
			'dimes' => 'Dimes',
			'quarters' => 'Quarters',
			'dollar_coins' => 'Dollar Coins',
			'ones' => 'Ones',
			'fives' => 'Fives',
			'tens' => 'Tens',
			'twenties' => 'Twenties',
			'fifties' => 'Fifties',
			'hundreds' => 'Hundreds',
			'session_id' => 'Session',
            'note' => 'Entered By',
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

		$criteria->compare('deposited_date',$this->deposited_date,true);

		$criteria->compare('total_amount',$this->total_amount,true);

		$criteria->compare('pennies',$this->pennies);

		$criteria->compare('nickels',$this->nickels);

		$criteria->compare('dimes',$this->dimes);

		$criteria->compare('quarters',$this->quarters);

		$criteria->compare('dollar_coins',$this->dollar_coins);

		$criteria->compare('ones',$this->ones);

		$criteria->compare('fives',$this->fives);

		$criteria->compare('tens',$this->tens);

		$criteria->compare('twenties',$this->twenties);

		$criteria->compare('fifties',$this->fifties);

		$criteria->compare('hundreds',$this->hundreds);

        $criteria->compare('session_id',$this->session_id);

        return new CActiveDataProvider('DepositDetails', array(
                                           'criteria'=>$criteria,
		));
	}
}