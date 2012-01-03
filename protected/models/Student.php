<?php

  /**
   * This is the model class for table "student".
   *
   * The followings are the available columns in table 'student':
   * @property integer $id
   * @property string $first_name
   * @property string $last_name
   * @property integer $grade
   * @property integer $public_email_ok
   * @property string $contact
   * @property string $emergency_1
   * @property string $emergency_2
   * @property string $emergency_3
   * @property string $parent_email
   */
class Student extends CActiveRecord
{


    public function getFull_name()
    {
        return $this->first_name.' '.$this->last_name;
    }

	/**
	 * Returns the static model of the specified AR class.
	 * @return Student the static model class
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
		return 'student';
	}

    public function getSummary()
    {
        return $this->full_name . " (". Yii::app()->format->gradeShort($this->grade) . ")";
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, grade, contact,emergency_1', 'required'),
			array('grade,public_email_ok', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>128),
			array('emergency_1, emergency_2, emergency_3, contact, parent_email, note', 'length', 'max'=>256),
            array('note', 'safe'),
            array('parent_email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, public_email_ok, last_name, grade, contact, emergency_1, emergency_2, emergency_3, parent_email', 'safe', 'on'=>'search'),
            );
	}



    public function defaultScope() {
        return array('order' => 'first_name ASC, last_name ASC');
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'incomes' => array(self::HAS_MANY, 'Income', 'student_id'),
			'classes' => array(
                self::HAS_MANY, 
                'ClassInfo', 
                'class_id', 
                'through' => 'signups'),
			'signups' => array(self::HAS_MANY, 'Signup', 'student_id'),
			'checks' => array(
                self::HAS_MANY, 
                'CheckIncome', 
                'check_id',
                'through' => 'incomes'),
            );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'grade' => 'Grade',
			'contact' => 'Parent Contact',
			'emergency_1' => 'Emergency 1',
			'emergency_2' => 'Emergency 2',
			'emergency_3' => 'Emergency 3',
            'parent_email' => 'Parent Email',
	        'note' => 'Note',
	        'public_email_ok' => 'Share Email with Instructor',
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

		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);

		$criteria->compare('grade',$this->grade);
        $criteria->compare('contact',$this->contact);
        $criteria->compare('public_email_ok',$this->public_email_ok);
 
		$criteria->compare('emergency_1',$this->emergency_1,true);

		$criteria->compare('emergency_2',$this->emergency_2,true);

		$criteria->compare('emergency_3',$this->emergency_3,true);

		$criteria->compare('parent_email',$this->parent_email,true);

		return new CActiveDataProvider('Student', array(
                                           'criteria'=>$criteria,
                                           ));
	}

    public function getOwed()
    {
        $res = array();
        foreach($this->signups as $s){
            $paid = 0;
            $cs = $s->class->costSummary;
            $inc=$this->incomes;
            foreach($inc as $i){
                if($i->class_id == $s->class_id){
                    $paid += $i->amount;
                }
            }
            $owed  =  $cs - $paid;
            if($s->scholarship < 1 && $owed > 0){
                $res[]= array('class' => $s->class,
                              'payee' => $s->class->company,
                              'amount' => $owed);
            }
        }
        return $res;
    }

    public function getPublic_email_address()
    {
        if($this->parent_email == ""){
            return "";
        }

        return $this->public_email_ok > 0 ? $this->parent_email : "(Private)";
    }

}