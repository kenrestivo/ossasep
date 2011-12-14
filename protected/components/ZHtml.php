<?php

class ZHtml extends CHtml
{

 
    public static function enumItem($model,$attribute)
    {
        $attr=$attribute;
        self::resolveName($model,$attr);
        preg_match('/\((.*)\)/',
                   $model->tableSchema->columns[$attr]->dbType,$matches);
        foreach(explode(',', $matches[1]) as $value)
        {
            $value=str_replace("'",null,$value);
            $values[$value]=Yii::t('enumItem',$value);
        }
                
        return $values;
    }  

    public static function enumDropDownList($model, $attribute, 
                                            $htmlOptions = array())
    {
        return CHtml::activeDropDownList( 
            $model, 
            $attribute,ZHtml::enumItem($model,  $attribute), 
            $htmlOptions);
    }


    public static function get_weekdays(){
        return  array(
            1 => 'Sunday',
            2 => 'Monday',
            3 => 'Tuesday',
            4 => 'Wednesday',
            5 => 'Thursday',
            6  => 'Friday', 
            7 => 'Saturday'
            );
    }

    public static function weekdayTranslation($weekday_num){
        $weekdays = ZHtml::get_weekdays();
        return $weekdays[$weekday_num];
    }


    public static function weekdayDropDownList($model, $attribute, 
                                               $htmlOptions = array())
    {
        return CHtml::activeDropDownList( 
            $model,
            $attribute,
            ZHtml::get_weekdays());

    }
    //TODO make this use DateTime, and all that cruft
    public static function militaryToCivilian($mil)
    {
        return (date("g:i a", strtotime($mil)));
    }

    //TODO make this use DateTime, and all that cruft
    public static function civilianToMilitary($civ)
    {
        return(date("H:i:s", strtotime($civ)));
    }

    public static function shortDate($sqldate)
    {
        return date('n/j', strtotime($sqldate));
    }


    public static function mediumDate($sqldate)
    {
        return date('m/d/y', strtotime($sqldate));
    }


    /* 
       Changes 0 to K, adds subscripts
    */
    static public function gradeFormat($grade)
    {

        // This from wikipedia:
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if (($grade %100) >= 11 && ($grade%100) <= 13)
            $abbreviation = $grade. 'th';
        else
            $abbreviation = $grade. $ends[$grade % 10];

        return CHtml::encode($grade > 0 ? $abbreviation : 'K');
    }

}

?>