<?php

/**
 * This is the model class for table "class_meeting".
 *
 * The followings are the available columns in table 'class_meeting':
 * @property integer $id
 * @property string $meeting_date
 * @property string $note
 * @property integer $makeup
 * @property integer $class_id
 */
class ClassMeeting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ClassMeeting the static model class
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
		return 'class_meeting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('meeting_date, class_id', 'required'),
			array('class_id, makeup', 'numerical', 'integerOnly'=>true),
			array('note', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, meeting_date, makeup, note, class_id', 
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
			'class' => array(self::BELONGS_TO, 
                             'ClassInfo', 
                             'class_id'),
			'school_day' => array(self::BELONGS_TO, 
                                  'SchoolCalendar', 
                                  'meeting_date'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'meeting_date' => 'Meeting Date',
			'note' => 'Note',
			'makeup' => 'Make-Up Day?',
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

		$criteria->compare('id',$this->id);

		$criteria->compare('meeting_date',$this->meeting_date,true);

		$criteria->compare('note',$this->note,true);
		$criteria->compare('makeup',$this->makeup,true);


		$criteria->compare('class_id',$this->class_id);

		return new CActiveDataProvider('ClassMeeting', array(
			'criteria'=>$criteria,
		));
	}

    public function getNotated_date()
    {
        if($this->note == ''){
            return CHtml::encode(ZHtml::shortDate($this->meeting_date));
        } else {
            return '<strong>' . CHtml::encode(ZHtml::shortDate($this->meeting_date)) . '</strong>' . CHtml::encode('*');
        }
    }

    public function setNextMeeting()
    {
        // this only makes sense if there's a class specified
        if(!isset($this->class_id)){
            return null;
        }

         // XXX this is ALMOST the same as in ClassInfo->populate_meetings
        // it worries me that it's not exactly the same
        $c = Yii::app()->db->createCommand(
            "select school_day from school_calendar where day_off < 1 and minimum < 1 and dayofweek(school_day) = :dayofweek and school_day > (select max(meeting_date) from class_meeting where class_meeting.class_id = :cid)  limit 1");
        $r=$c->queryRow(true, array(
                            'dayofweek' => $this->class->day_of_week,
                            'cid' => $this->class_id
                            ));
        $this->meeting_date = $r['school_day'];
    }

}