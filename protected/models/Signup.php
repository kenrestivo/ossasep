<?php

/**
 * This is the model class for table "signup".
 *
 * The followings are the available columns in table 'signup':
 * @property integer $student_id
 * @property integer $class_id
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

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('student_id, class_id', 'required'),
            array('student_id, class_id, status', 'numerical', 'integerOnly'=>true),
            array('signup', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('student_id, class_id, signup, status', 'safe', 'on'=>'search'),
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
            'student_id' => 'Student',
            'class_id' => 'Class',
            'signup' => 'Signup',
            'status' => 'Status',
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
        $criteria->compare('signup',$this->signup,true);
        $criteria->compare('status',$this->status);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
