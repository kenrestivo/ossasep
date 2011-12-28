<?php

  /**
   * This is the model class for table "instructor".
   *
   * The followings are the available columns in table 'instructor':
   * @property integer $id
   * @property string $full_name
   * @property string $email
   * @property string $cell_phone
   * @property string $other_phone
   * @property string $note
   * @property string $alias
   * @property integer $instructor_type_id
   * @property integer $company_id
   */
class Instructor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Instructor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getIsCompany()
    {
        return $this->instructor_type_id == InstructorType::COMPANY_TYPE;
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'instructor';
	}

    public function getPublic_name()
    {
        return $this->alias != '' ? $this->alias : $this->full_name;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('full_name, company_id, instructor_type_id', 'required'),
			array('instructor_type_id,company_id', 'numerical', 'integerOnly'=>true),
			array('full_name, alias', 'length', 'max'=>128),
			array('email, cell_phone, other_phone, note', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, full_name, alias, email, company_id, cell_phone, other_phone, note, instructor_type_id', 'safe', 'on'=>'search'),
            );
	}

    public function defaultScope() {
        return array('order' => 'full_name ASC');
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'check_expenses' => array(
                self::HAS_MANY, 
                'CheckExpense', 
                'instructor_id',
                'through' => 'expenses'),
			'instructor_type' => array(
                self::BELONGS_TO, 
                'InstructorType', 
                'instructor_type_id'),
			'company' => array(
                self::BELONGS_TO, 
                'Company', 
                'company_id'),
			'classes' => array(
                self::HAS_MANY, 
                'ClassInfo', 
                'class_id',
                'through' => 'instructor_assignments'),
			'requirement_types' => array(
                self::MANY_MANY, 
                'RequirementType', 
                'requirement_status(instructor_id, requirement_type_id)'),
			'instructor_assignments' => array(
                self::HAS_MANY, 
                'InstructorAssignment', 
                'instructor_id'),
			'expenses' => array(
                self::HAS_MANY, 
                'Expense', 
                'instructor_id'),
			'requirement_status' => array(
                self::HAS_MANY, 
                'RequirementStatus', 
                'instructor_id'),
			'active_classes' => array(
                self::HAS_MANY, 
                'ClassInfo', 
                'class_id',
                'through' => 'instructor_assignments',
                'condition' => "status != 'Cancelled'"),
            );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'full_name' => 'Full Name',
			'email' => 'Email',
			'cell_phone' => 'Cell Phone',
			'other_phone' => 'Other Phone',
			'note' => 'Note',
			'company_id' => 'Company',
			'alias' => 'Alias',
			'instructor_type_id' => 'Instructor Type',
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

		$criteria->compare('full_name',$this->full_name,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('cell_phone',$this->cell_phone,true);

		$criteria->compare('other_phone',$this->other_phone,true);

		$criteria->compare('note',$this->note,true);
		$criteria->compare('alias',$this->alias,true);

		$criteria->compare('instructor_type_id',$this->instructor_type_id);
		$criteria->compare('company_id',$this->company_id);

		return new CActiveDataProvider('Instructor', array(
                                           'criteria'=>$criteria,
                                           ));
	}



    public function getPaid()
    {
        $c = Yii::app()->db->createCommand(
            "select sum(expense.amount) as total from expense
 where  expense.instructor_id = :id");
        $r=$c->queryRow(true, array('id' => $this->id));
        return $r['total'];

    }

    /*
      NOTE: this is EXPENSE delivered, not check ddelivered i..e for companies
      TODO: overload it maybe? pick the right one based on company?
     */

    public function getDelivered()
    {
        $c = Yii::app()->db->createCommand(
            "select sum(expense.amount) as total from expense
left join check_expense 
    on check_expense.id = expense.check_id
where check_expense.delivered > '1999-01-01'
  and expense.instructor_id = :id");
        $r=$c->queryRow(true, array('id' => $this->id));
        return $r['total'];

    }

}