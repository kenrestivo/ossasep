<?php

  /**
   * This is the model class for table "requirement_status".
   *
   * The followings are the available columns in table 'requirement_status':
   * @property integer $instructor_id
   * @property integer $requirement_type_id
   * @property string $received
   * @property string $note
   * @property string $expired
   */
class RequirementStatus extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RequirementStatus the static model class
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
		return 'requirement_status';
	}
    public function primaryKey(){
        return array('instructor_id','requirement_type_id');
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('instructor_id, requirement_type_id', 'required'),
			array('instructor_id, requirement_type_id', 'numerical', 'integerOnly'=>true),
			array('received, expired, note', 'safe'),
			array('note', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('instructor_id, requirement_type_id, received, expired, note', 'safe', 'on'=>'search'),
            array('instructor_id', 'ext.CompositeUnique', 
                  'on' => 'insert')
            );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        return array('instructor' => array(
                         self::BELONGS_TO, 
                         'Instructor', 
                         'instructor_id'),
                     'requirement_type' => array(
                         self::BELONGS_TO, 
                         'RequirementType', 
                         'requirement_type_id'),
            );

	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'instructor_id' => 'Instructor',
			'requirement_type_id' => 'Requirement Type',
			'received' => 'Received On',
			'expired' => 'Expires On',
			'note' => 'Note',
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

		$criteria->compare('instructor_id',$this->instructor_id);

		$criteria->compare('requirement_type_id',$this->requirement_type_id);

		$criteria->compare('received',$this->received,true);

		$criteria->compare('expired',$this->expired,true);
        $criteria->compare('note' ,$this->expired,true);

		return new CActiveDataProvider('RequirementStatus', array(
                                           'criteria'=>$criteria,
                                           ));
	}

    public function getIs_expired()
    {
        // no date or 0 date means doesn't expire
        if($this->expired == '' || strtotime($this->expired) < 100){
            return false;
        }
        return strtotime($this->expired) <= strtotime(date('Y-m-d'));
    }

    /*
      This is necessary. 
      There may be missing paperwork that DOES have a note here,
      so we have to check for that explicitly.
     */
    
    public function getIs_missing()
    {
        // no date or 0 date means doesn't expire
        return $this->received == ''  || strtotime($this->received) < 100 ;

    }
    /*
      If it is expiring before the end of the currently-chosen session.
     */
    public function getIs_expiring()
    {
        // no date or 0 date means doesn't expire
        if($this->expired == '' ||  strtotime($this->expired) < 100){
            return false;
        }
        return strtotime($this->expired) < strtotime(
            ClassSession::current()->end_date);
    }


    public function getStatus()
    {
        if($this->missing){
            return "Missing";
        } else if($this->expiring)  {
            return "Expiring soon";
        } else if($this->expired)  {
            return "Expired";
        } else {
            return "OK";
        }
    }

}