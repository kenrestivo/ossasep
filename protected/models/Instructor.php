<?php

  /**
   * This is the model class for table "instructor".
   *
   * The followings are the available columns in table 'instructor':
   * @property integer $id
   * @property string $first_name
   * @property string $last_name
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

    public function getIs_company()
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

    public function getFull_name()
    {
        return $this->first_name.' '.$this->last_name;
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
			array('first_name, last_name,company_id, instructor_type_id', 'required'),
			array('instructor_type_id,company_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, alias', 'length', 'max'=>128),
			array('email, cell_phone, other_phone, note', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, last_name,alias, email, company_id, cell_phone, other_phone, note, instructor_type_id', 'safe', 'on'=>'search'),
            );
	}

    public function defaultScope() {
        return array('order' => 'last_name ASC, first_name asc');
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

    /*
      Blow off all this idiotic activerecord crap and just do it RIGHT in sql.
     */

    public function getInstructor_assignments()
    {
        return InstructorAssignment::model()->findAllBySql(
            'select instructor_assignment.* 
              from instructor_assignment
              left join class_info
               on instructor_assignment.class_id = class_info.id
              where instructor_assignment.instructor_id = :iid
                and class_info.session_id = :sid',
            array('sid' => ClassSession::savedSessionId(),
                'iid' => $this->id)
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

		$criteria->compare('first_name',$this->first_name,true);

		$criteria->compare('last_name',$this->last_name,true);

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


/*
  XXX This is NASTY but I don't know a cleaner way to do it.
 */

    public function getOwed()
    {
        $c = Yii::app()->db->createCommand(
"select sum(paids.total_paid) as owed, 
       paids.instructor_id
from    
    (select csum.total_paid, 
            instructor_assignment.percentage, 
           instructor_assignment.instructor_id, 
           (csum.total_paid * instructor_assignment.percentage/100) as owed
    from instructor_assignment
    left join 
       (select class_info.class_name, sum(income.amount) as total_paid,
             income.class_id as class_id
            from income
            left join check_income
                 on check_income.id = income.check_id
            left join class_info 
                 on class_info.id = income.class_id
            left join signup
                on signup.class_id = income.class_id
                    and signup.student_id = income.student_id
            where (check_income.returned is null
                    or check_income.returned < '1999-01-01')
                    and signup.status = 'Enrolled'
                  and class_info.session_id = :sid
            group by class_info.id
            order by class_info.class_name asc) as csum
        on csum.class_id = instructor_assignment.class_id
    where total_paid is not null) as paids
where paids.instructor_id = :inst"
);
        $r=$c->queryRow(true,             array(
                            'inst' => $this->id,
                            'sid' => ClassSession::savedSessionId()));
        return $r['owed'];
 
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