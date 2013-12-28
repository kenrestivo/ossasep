<?php

/**
 * This is the model class for table "language".
 *
 * The followings are the available columns in table 'language':
 * @property integer $id
 * @property string $code_name
 * @property string $description
 */
class Language extends CActiveRecord
{

    const DEFAULT_LANGUAGE_ID = 1; // english

	/**
	 * Returns the static model of the specified AR class.
	 * @return Language the static model class
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
		return 'language';
	}

    public function getSummary()
    {
        return $this->description;
    }


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code_name, description', 'required'),
			array('code_name, description', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, code_name, description', 'safe', 'on'=>'search'),
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
			'class_descriptions' => array(self::HAS_MANY, 'ClassDescription', 'language_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'code_name' => 'Code Name',
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

		$criteria->compare('code_name',$this->code_name,true);

		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider('Language', array(
										   'criteria'=>$criteria,
										   ));
	}



    public static function enabledLanguages($public = true)
    {
		// TODO: enable hiding languages
        return self::model()->findAll();
    }


	public static function setLanguageId($id)
	{

		Yii::app()->session['saved_language_id'] =  $id;

	}


    public static function savedLanguageId()
    {

		// english unless they've chosen something else
        if(!isset(Yii::app()->session['saved_language_id'])){
            Yii::app()->session['saved_language_id'] = self::DEFAULT_LANGUAGE_ID;
        }
        return Yii::app()->session['saved_language_id'];
    }



    /* 
       Just a utility function, often getting this session! returns obj
    */
    public static function current()
    {
        $cur = self::model()->findByPk(self::savedLanguageId());
        if(isset($cur)){
            return $cur;
        }

        // this should NOT HAPPEN
        trace(Yii::app()->language['saved_language_id']);
        // reset it
        unset(Yii::app()->language['saved_language_id']);
        // recurse, try again!
        return self::current(); 
        
    }


}