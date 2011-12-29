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


    public static function rowHack($grid, $data, $row)
    {
        $std = $grid->rowCssClass[$row % count($grid->rowCssClass)];
        if($data->status == "Cancelled"){
            $std = " strikethrough";
        }
        if($data->status == "Waitlist"){
            $std = " waitlist";
        }
        return $std;

    }
    /*
      generates the selection changed code for a clickable row in cgridview
     */
    
    public static function clickableRow($route, $type='normal', $count = 0)
    {
        if($type ==='normal'){
            return "function(id){window.location='" . Yii::app()->urlManager->createUrl($route, array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}";
        }else {
            return "function(id){window.location='" . Yii::app()->urlManager->createUrl($route, array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id)[0].split(',')[". $count . "];}";
        }
    }


}

?>