<?php

  /**
   * This is the model class for table "check_income".
   *
   * The followings are the available columns in table 'check_income':
   * @property integer $id
   * @property string $amount
   * @property string $payer
   * @property string $payee_id
   * @property integer $check_num
   * @property integer $cash
   * @property string $check_date
   * @property string $returned
   * @property integer $session_id
   * @property string $delivered
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
    public function getSummary()
    {
        return sprintf('#%s $%0.2f %s %s ',
                       $this->check_num,
                       $this->amount,
                       Yii::app()->format->date($this->check_date),
                       $this->payer
            );
    }


    /// TODO: replace with with-related
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
			array('amount, check_date, session_id, payee_id', 'required'),
			array('deposit_id, cash, session_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>19),
			array('amount', 'numerical'),
			array('delivered,returned', 'safe'),
			array('payer,check_num', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes tghat should not be searched.
			array('id, amount, cash, session_id, payer, returned, payee_id, delivered, check_num, check_date, deposit_id', 'safe', 'on'=>'search'),
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
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'deposit' => array(self::BELONGS_TO, 'DepositDetails', 'deposit_id'),
			'session' => array(self::BELONGS_TO, 'ClassSession', 'session_id',
                               'order' => 'start_date'),
			'incomes' => array(self::HAS_MANY, 'Income', 'check_id'),
            // this is kind of ugly, but instructors might change,
            // and checks are forever once written
			'payee' => array(self::BELONGS_TO, 'Company', 'payee_id'),
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
			'deposit_id' => 'Deposit',
			'delivered' => 'Delivered to Company',
			'returned' => 'Returned to Student',
			'cash' => 'Cash (not check)',
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

		$criteria->compare('payee_id',$this->payee_id,true);

		$criteria->compare('delivered',$this->delivered,true);
		$criteria->compare('returned',$this->returned,true);

		$criteria->compare('check_num',$this->check_num);

		$criteria->compare('check_date',$this->check_date,true);

		$criteria->compare('cash',$this->cash,true);

		$criteria->compare('deposit_id',$this->deposit_id);

		$criteria->compare('session_id',$this->session_id);
		return new CActiveDataProvider('CheckIncome', array(
                                           'criteria'=>$criteria,
                                           ));
	}

/*
  This does NOT deal with cancellations!
*/

    public static function underAssignedChecks($session = null, $company = null)
    {
        if(!isset($session)){
            $session = ClassSession::savedSessionId();
        }
        $q= "select check_income.*
             from check_income
              left join
               (select income.check_id as check_id,
                    sum(income.amount) as assigned
                from income 
                group by income.check_id) as assignments
               on  (assignments.check_id = check_income.id)
         where assignments.assigned < check_income.amount
               and check_income.session_id = :session";

        if(isset($company)){
            ///XXX hACK!, just use querybuilder will ya?
            $q .= " and check_income.payee_id = $company";
        }

        return CheckIncome::model()->findAllBySql($q,
                                                  array('session' => $session));

    }
/*
  This does NOT deal with cancellations!
*/

    public function getAssigned()
    {
        $c = Yii::app()->db->createCommand(
            "select sum(income.amount) as total from income
where check_id = :cid");
        $r=$c->queryRow(true, array('cid' => $this->id));
        return $r['total'];

    }
/*
  This does NOT deal with cancellations!
*/

    public function getUnassigned()
    {
        return (int)$this->amount - (int)$this->assigned;
    }

}