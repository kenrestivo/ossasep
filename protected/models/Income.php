<?php

  /**
   * This is the model class for table "income".
   *
   * The followings are the available columns in table 'income':
   * @property integer $check_id
   * @property integer $student_id
   * @property integer $class_id
   * @property string $amount
   */
class Income extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Income the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
		return 'income';
	}
    public function primaryKey(){
        return array('check_id','student_id', 'class_id');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('amount', 'required'),
			array('student_id, class_id, amount', 'required'),
            // on the check validation, do NOT check, um, check.
			array('check_id', 'required', 'on' => array('insert', 'update')),
			array('check_id, student_id, class_id', 'numerical', 
                  'integerOnly'=>true),
			array('amount', 'length', 'max'=>19),
			array('amount', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('check_id, student_id, class_id, amount', 
                  'safe', 'on'=>'search'),
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
			'check' => array(self::BELONGS_TO, 'CheckIncome', 'check_id'),
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'class' => array(self::BELONGS_TO, 'ClassInfo', 'class_id'),
            );
	}


    /*
      Because activerecord sucks.
     */
    public function getSignup()
    {
        return Signup::model()->find(
            array("condition" => "(class_id = :cid and student_id = :sid)",
                  'params' => array(
                      'cid' => $this->class_id,
                      'sid' => $this->student_id)));
    }

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'check_id' => 'Check',
			'amount' => 'Amount',
			'student_id' => 'Student',
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

		$criteria->compare('check_id',$this->check_id);

		$criteria->compare('student_id',$this->student_id);

		$criteria->compare('class_id',$this->class_id);

		$criteria->compare('amount',$this->amount,true);


		return new CActiveDataProvider('Income', array(
                                           'criteria'=>$criteria,
                                           ));
	}
}