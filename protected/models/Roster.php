<?php

/**
 * This is the model class for table "roster".
 *
 * The followings are the available columns in table 'roster':
 * @property integer $id
 * @property string $last_name
 * @property string $first_name
 * @property string $grade
 * @property string $teacher
 * @property string $parent_1
 * @property string $parent_2
 * @property string $parent_3
 * @property string $parent_4
 * @property string $phone
 * @property string $cell__parent_1
 * @property string $cell_parent_2
 * @property string $email_parent_1
 * @property string $email__parent_2
 * @property string $email_parent_3
 * @property string $email_parent_4
 * @property string $home_address
 * @property string $home_city
 * @property string $zip_code
 * @property string $home_address_2
 * @property string $school_job
 */
class Roster extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Roster the static model class
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
		return 'roster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('last_name, first_name, grade, teacher, parent_1, parent_2, parent_3, parent_4, phone, cell__parent_1, cell_parent_2, email_parent_1, email__parent_2, email_parent_3, email_parent_4, home_address, home_city, zip_code, home_address_2, school_job', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, last_name, first_name, grade, teacher, parent_1, parent_2, parent_3, parent_4, phone, cell__parent_1, cell_parent_2, email_parent_1, email__parent_2, email_parent_3, email_parent_4, home_address, home_city, zip_code, home_address_2, school_job', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'last_name' => 'Last Name',
			'first_name' => 'First Name',
			'grade' => 'Grade',
			'teacher' => 'Teacher',
			'parent_1' => 'Parent 1',
			'parent_2' => 'Parent 2',
			'parent_3' => 'Parent 3',
			'parent_4' => 'Parent 4',
			'phone' => 'Phone',
			'cell__parent_1' => 'Cell Parent 1',
			'cell_parent_2' => 'Cell Parent 2',
			'email_parent_1' => 'Email Parent 1',
			'email__parent_2' => 'Email Parent 2',
			'email_parent_3' => 'Email Parent 3',
			'email_parent_4' => 'Email Parent 4',
			'home_address' => 'Home Address',
			'home_city' => 'Home City',
			'zip_code' => 'Zip Code',
			'home_address_2' => 'Home Address 2',
			'school_job' => 'School Job',
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

		$criteria->compare('last_name',$this->last_name,true);

		$criteria->compare('first_name',$this->first_name,true);

		$criteria->compare('grade',$this->grade,true);

		$criteria->compare('teacher',$this->teacher,true);

		$criteria->compare('parent_1',$this->parent_1,true);

		$criteria->compare('parent_2',$this->parent_2,true);

		$criteria->compare('parent_3',$this->parent_3,true);

		$criteria->compare('parent_4',$this->parent_4,true);

		$criteria->compare('phone',$this->phone,true);

		$criteria->compare('cell__parent_1',$this->cell__parent_1,true);

		$criteria->compare('cell_parent_2',$this->cell_parent_2,true);

		$criteria->compare('email_parent_1',$this->email_parent_1,true);

		$criteria->compare('email__parent_2',$this->email__parent_2,true);

		$criteria->compare('email_parent_3',$this->email_parent_3,true);

		$criteria->compare('email_parent_4',$this->email_parent_4,true);

		$criteria->compare('home_address',$this->home_address,true);

		$criteria->compare('home_city',$this->home_city,true);

		$criteria->compare('zip_code',$this->zip_code,true);

		$criteria->compare('home_address_2',$this->home_address_2,true);

		$criteria->compare('school_job',$this->school_job,true);

		return new CActiveDataProvider('Roster', array(
			'criteria'=>$criteria,
		));
	}
}