<?php

/**
 * This is the model class for table "class_description".
 *
 * The followings are the available columns in table 'class_description':
 * @property integer $id
 * @property string $description
 * @property integer $language_id
 * @property integer $class_id
 */
class ClassDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ClassDescription the static model class
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
		return 'class_description';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description, language_id, class_id', 'required'),
			array('language_id, class_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, description, language_id, class_id', 'safe', 'on'=>'search'),
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
			'language' => array(self::BELONGS_TO, 'Language', 'language_id'),
			'class' => array(self::BELONGS_TO, 'ClassInfo', 'class_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'description' => 'Description',
			'language_id' => 'Language',
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

		$criteria->compare('description',$this->description,true);

		$criteria->compare('language_id',$this->language_id);

		$criteria->compare('class_id',$this->class_id);

		return new CActiveDataProvider('ClassDescription', array(
			'criteria'=>$criteria,
		));
	}
}