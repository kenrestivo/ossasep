<?php

  /**
   * This is the model class for table "check_income".
   *
   * The followings are the available columns in table 'check_income':
   * @property integer $id
   * @property string $amount
   * @property string $payer
   * @property string $payee
   * @property integer $check_num
   * @property string $check_date
   * @property integer $deposit_id
   */
class CheckIncome extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CheckIncome the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function getShort_name()
        {
            return sprintf('$%0.2f %s %s (#%s)',
                           $this->amount,
                           $this->payer,
                           $this->check_date,
                           $this->check_num
                );
        }


    public function behaviors()
    {
        return array(
            'withRelated'=>array(
                'class'=>'ext.wr.WithRelatedBehavior',
                ),
            );
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'check_income';
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
			array('check_num, deposit_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>19),
			array('amount', 'numerical'),
			array('payer, payee', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, amount, payer, payee, check_num, check_date, deposit_id', 'safe', 'on'=>'search'),
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
			'deposit' => array(self::BELONGS_TO, 'DepositDetails', 'deposit_id'),
			'incomes' => array(self::HAS_MANY, 'Income', 'check_id'),
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
			'deposit_id' => 'Deposit',
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

		$criteria->compare('deposit_id',$this->deposit_id);

		return new CActiveDataProvider('CheckIncome', array(
                                           'criteria'=>$criteria,
                                           ));
	}
}