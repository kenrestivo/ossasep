<?php

/**
 * This is the model class for table "class_session".
 *
 * The followings are the available columns in table 'class_session':
 * @property integer $id
 * @property integer $school_year_id
 * @property string $start_date
 * @property string $end_date
 * @property string $description
 */
class ClassSession extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ClassSession the static model class
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
		return 'class_session';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_year_id, description, start_date, end_date', 
                  'required'),
			array('school_year_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, school_year_id, description, start_date, end_date', 
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
			'classes' => array(
                self::HAS_MANY, 
                'ClassInfo', 
                'session_id',
                'order' => 'class_name'), 
			'school_year' => array(self::BELONGS_TO, 'SchoolYear', 'school_year_id'),
            'active_classes' => array(
                self::HAS_MANY, 
                'ClassInfo', 
                'session_id',
                'condition' => "(status = 'Active' or status = 'New')",
                'order' => 'class_name'), 
            'cancelled_classes' => array(
                self::HAS_MANY, 
                'ClassInfo', 
                'session_id',
                'condition' => "status = 'Cancelled'",
                'order' => 'class_name'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */

    public function getSummary(){
        return sprintf(
            'Session %s (%s)', 
            $this->description,
            $this->school_year->description);
 
    }

	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
			'school_year_id' => 'School Year',
			'description' => 'Description',
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

		$criteria->compare('school_year_id',$this->school_year_id);

		$criteria->compare('start_date',$this->start_date,true);

        $criteria->compare('end_date',$this->end_date,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('ClassSession', array(
			'criteria'=>$criteria,
		));
	}
}