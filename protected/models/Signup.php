<?php

  /**
   * This is the model class for table "signup".
   *
   * The followings are the available columns in table 'signup':
   * @property integer $student_id
   * @property integer $class_id
   * @property integer $scholarship
   * @property string $signup
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
            array('student_id', 'uniqueKey', 'on' => 'insert'),
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
        return Income::model()->find(
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

    public function uniqueKey($attribute,$params)
    {
        if(!$this->hasErrors()){
            $found = Signup::model()->find(
                'student_id = ? AND class_id = ?', 
                array($this->student_id, $this->class_id));

            if($found){
                $this->addError(
                    'summary', 
                    $found->student->full_name . " already signed up for " . $found->class->summary);
            }
        }
    }
}