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


    public function getSummary()
    {
        $res = '#'.$this->id;
        if($this->total_amount > 0){
            $res .= Yii::app()->format->currency($this->total_amount);
        }
        $res .=' (' . Yii::app()->format->date($this->deposited_date) . ')';
        return $res;
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
			array('note', 'length', 'max'=>255),
			array('total_amount', 'numerical'),
			array('deposited_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, session_id, note, deposited_date, total_amount, pennies, nickels, dimes, quarters, dollar_coins, ones, fives, tens, twenties, fifties, hundreds', 'safe', 'on'=>'search'),
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
			'payments' => array(self::HAS_MANY, 'CheckIncome', 'deposit_id'),
			'checks' => array(self::HAS_MANY, 
                              'CheckIncome', 
                              'deposit_id',
                              'condition' => '(cash < 1)'),
			'cash' => array(self::HAS_MANY, 
                            'CheckIncome', 
                            'deposit_id',
                            'condition' => 'cash > 0'),
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
			'pennies' => '$0.01',
			'nickels' => '$0.05',
			'dimes' => '$0.10',
			'quarters' => '$0.25',
			'dollar_coins' => '$1.00',
			'ones' => '$1.00',
			'fives' => '$5.00',
			'tens' => '$10.00',
			'twenties' => '$20.00',
			'fifties' => '$50.00',
			'hundreds' => '$100.00',
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

    public function getTwenties_total()
    {
        return $this->twenties * 20.00;
    }
    
    public function getFives_total()
    {
        return $this->fives * 5.00;
    }
    
    public function getPennies_total()
    {
        return $this->pennies * 0.01;
    }
    
    public function getQuarters_total()
    {
        return $this->quarters * 0.25;
    }
    
    public function getNickels_total()
    {
        return $this->nickels * 0.05;
    }
    
    public function getOnes_total()
    {
        return $this->ones * 1.00;
    }
    
    public function getFifties_total()
    {
        return $this->fifties * 50.00;
    }
    
    public function getTens_total()
    {
        return $this->tens * 10.00;
    }
    
    public function getDollar_coins_total()
    {
        return $this->dollar_coins * 1.00;
    }
    
    public function getHundreds_total()
    {
        return $this->hundreds * 100.00;
    }
    
    public function getDimes_total()
    {
        return $this->dimes * 0.10;
    }
    

    public function getSubtotal_cash()
    {
        return
            $this->ones * 1.00 + 
            $this->fives * 5.00 + 
            $this->hundreds * 100.00 + 
            $this->twenties * 20.00 + 
            $this->fifties * 50.00 + 
            $this->tens * 10.00 ;
    }

    public function getSubtotal_coin()
    {

        return $this->pennies * 0.01 + 
            $this->nickels * 0.05 + 
            $this->quarters * 0.25 + 
            $this->dollar_coins * 1.00 + 
            $this->dimes * 0.10 ;

    }

    public function getDiscrepancy()
    {
        return $this->subtotal_cash_payments - $this->subtotal_reconciliation;

    }


    public function subtotalPayments($type = 'check')
    {
        $cash_comparison = $type == 'check'  ? "check_income.cash < 1" : " check_income.cash > 0";

        $c = Yii::app()->db->createCommand(
            "select sum(amount) as total
from check_income
where check_income.deposit_id = :id
and ($cash_comparison)
");
        $r = $c->queryRow(true, array('id' => $this->id));
        return $r['total'];
    }


    public function getSubtotal_checks()
    {
        return $this->subtotalPayments('check');
    }


    public function getSubtotal_cash_payments()
    {
        return $this->subtotalPayments('cash');
    }


    public function getTotal_calculated()
    {
        return $this->subtotal_cash_payments + $this->subtotal_checks;
    }


    public function getSubtotal_reconciliation()
    {
        return $this->subtotal_cash + $this->subtotal_coin;
    }


    public function populate($type = 'check')
    {
        $cash_comparison = $type == 'check'  ? "check_income.cash < 1" : " check_income.cash > 0";
        
        /* XXX TODO, the rest of the criteria here!
           - enrolled count > minimum
           - income count > 1
        */
        $r = CheckIncome::model()->findAllBySql(
            "
select check_income.*
from check_income
left join  (select sum(income.amount) as total,
                   income.check_id as check_id
            from income
            group by income.check_id
          ) as income_summary
on income_summary.check_id = check_income.id
left join  (select income.check_id as check_id,
                count(signup.class_id) as unenrolled_count
            from income
            left join signup
                on signup.class_id = income.class_id
                    and signup.student_id = income.student_id
            left join (
                        select count(signup.student_id) as total_enrolled,
                               class_info.min_students as min,
                               class_info.status as status,
                               signup.class_id as class_id 
                        from class_info
                        left join signup
                             on class_info.id = signup.class_id
                        where signup.status = 'Enrolled'
                        group by class_id
                     ) as class_summary
            on class_summary.class_id = signup.class_id
            where signup.status != 'Enrolled'
                or class_summary.total_enrolled < class_summary.min
                or  class_summary.status = 'Cancelled'
            group by income.check_id
          ) as signup_status
on signup_status.check_id = check_income.id
where income_summary.total = check_income.amount
      and signup_status.unenrolled_count is null
      and check_income.payee_id = :osspto
      and (check_income.deposit_id is null or check_income.deposit_id < 1)
      and ( $cash_comparison )
      and check_income.session_id = :sid
      and (check_income.returned is null or check_income.returned < '2000-01-01')
",
            array( 'osspto' => Company::OSSPTO_COMPANY,
                   'sid' => ClassSession::savedSessionId()));
        foreach($r as $i){
            $i->deposit_id = $this->id;
            $i->save();
        }
    }



}