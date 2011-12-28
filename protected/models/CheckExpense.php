<?php

/**
 * This is the model class for table "check_expense".
 *
 * The followings are the available columns in table 'check_expense':
 * @property integer $id
 * @property string $amount
 * @property string $payer
 * @property string $payee_id
 * @property integer $check_num
 * @property integer $session_id
 * @property string $check_date
 * @property string $delivered
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
			array('amount, check_date, payee_id, session_id', 'required'),
			array('payee_id, session_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>19),
			array('delivered', 'safe'),
			array('payer, check_num', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, payer, session_id, payee_id, delivered, check_num, check_date', 'safe', 'on'=>'search'),
            array('payer','default',
                  'value'=> 'OSS PTO',
                  'setOnEmpty'=>true,
                  'on'=>'insert'),
            array('session_id','default',
                  'value'=> ClassSession::savedSessionId(),
                  'setOnEmpty'=>true,
                  'on'=>'insert'),
            );
	}

    public function defaultScope() {
        return array(
            'condition' => 'session_id = ' . ClassSession::savedSessionId(),
            'order' => 'check_num asc',
            );
    }


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
            'expenses' => array(self::HAS_MANY, 'Expense', 'check_id'),
			'session' => array(self::BELONGS_TO, 'ClassSession', 'session_id',
                               'order' => 'start_date'),
            // this is kind of ugly, but instructors might change,
            // and checks are forever once written
			'payee' => array(self::BELONGS_TO, 'Instructor', 'payee_id'),
			'instructors' => array(
                self::HAS_MANY, 
                'Instructor', 
                'instructor_id',
                'through' => 'expenses'),
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
			'payee_id' => 'Payee',
			'check_num' => 'Check Num',
			'check_date' => 'Check Date',
			'delivered' => 'Delivered',
			'session_id' => 'Session',
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

		$criteria->compare('payee_id',$this->payee,true);

		$criteria->compare('delivered',$this->delivered,true);

		$criteria->compare('check_num',$this->check_num);

		$criteria->compare('check_date',$this->check_date,true);
		$criteria->compare('session_id',$this->session_id);

		return new CActiveDataProvider('CheckExpense', array(
			'criteria'=>$criteria,
		));
	}
}