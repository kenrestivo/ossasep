<?php

/**
 * This is the model class for table "expense".
 *
 * The followings are the available columns in table 'expense':
 * @property integer $check_id
 * @property integer $instructor_id
 * @property string $delivered
 * @property string $amount
 */
class Expense extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Expense the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function primaryKey(){
        return array('check_id', 'instructor_id');
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'expense';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('check_id, instructor_id, amount', 'required'),
			array('check_id, instructor_id', 'numerical', 'integerOnly'=>true),
			array('delivered', 'safe'),
			array('amount', 'length', 'max'=>19),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('check_id, instructor_id, delivered, amount', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        return array(
			'instructor' => array(self::BELONGS_TO, 
                                  'Instructor', 
                                  'instructor_id'),
			'check' => array(self::BELONGS_TO, 
                             'CheckExpense', 
                             'check_id'),
            );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'check_id' => 'Check',
			'amount' => 'Amount',
			'instructor_id' => 'Instructor',
			'delivered' => 'Delivered',
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

		$criteria->compare('check_id',$this->check_id);

		$criteria->compare('instructor_id',$this->instructor_id);
        
        $criteria->compare('amount',$this->amount,true);

		$criteria->compare('delivered',$this->delivered,true);

		return new CActiveDataProvider('Expense', array(
			'criteria'=>$criteria,
		));
	}
}