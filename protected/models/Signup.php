<?php

  /**
   * This is the model class for table "signup".
   *
   * The followings are the available columns in table 'signup':
   * @property integer $student_id
   * @property integer $class_id
   * @property integer $scholarship
   * @property string $signup_date
   * @property integer $status
   */
class Signup extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return Signup the static model class
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
        return 'signup';
    }

    public function primaryKey(){
        return array('student_id', 'class_id');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('student_id, class_id', 'required'),
            array('student_id, class_id,scholarship', 'numerical', 'integerOnly'=>true),
            array('signup_date, status,note', 'safe'),
            /* the set on empty is just a belt-and-suspenders
               the controller sets a default anyway.
               but if the user deletes the default, 
               this will make sure something goes in there
            */
            array('student_id', 'ext.CompositeUnique', 
                  'on' => 'insert',
                  'error_message' => '$data->student->full_name . " already signed up for " . $data->class->summary'),
            array('signup_date','default',
                  'value'=> date ("Y-m-d H:i:s"),
                  'setOnEmpty'=>true,
                  'on'=>'insert'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('student_id, class_id, signup_date, scholarship, status', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'student_id'),
			'class' => array(self::BELONGS_TO, 'ClassInfo', 'class_id'),
            );
    }


    /*
      Because activerecord sucks.
    */
    public function getIncome()
    {
        return Income::model()->findAllBySql(
            "select income.* from income 
left join check_income
   on check_income.id = income.check_id
where (class_id = :cid and student_id = :sid)
and (check_income.returned is null or check_income.returned < '2000-01-01')",
                  array(
                      'cid' => $this->class_id,
                      'sid' => $this->student_id));
    }

    /*
      XXX this is stupid. use criteria and cdb
     */
    public function getPaid()
    {
        $paid = 0;
        foreach($this->income as $i){
            $paid += $i->amount;
        }
        return $paid;
        
    }

    /* 
       XXX this, too, is stupid. use criteria
    */
    public function getCost()
    {
        // this is very subtle though, note!
        // the cost is 0 if it is cancelled. watch it!
        return $this->status == 'Cancelled' ? 0 : $this->class->costSummary;
    }


    public function getOwed()
    {
        return $this->scholarship ? 0  : $this->cost  - $this->paid;
    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'student_id' => 'Student',
            'class_id' => 'Class',
            'signup_date' => 'Signed up on',
            'status' => 'Status',
            'scholarship' => 'Scholarship',
            'note' => 'Note'
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

        $criteria->compare('student_id',$this->student_id);
        $criteria->compare('class_id',$this->class_id);
        $criteria->compare('signup_date',$this->signup,true);
        $criteria->compare('scholarship',$this->signup,true);
        $criteria->compare('status',$this->status);

        return new CActiveDataProvider($this, array(
                                           'criteria'=>$criteria,
                                           ));
    }


}