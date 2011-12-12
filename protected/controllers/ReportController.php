<?php

class ReportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // just, go away and let me work, please
				'actions'=>array('*'),
				'users'=>array('*'),
			),
		);
	}

	public function actionWeekday()
	{
        $classes = array();
        // only weekdays, no sat/sun
        foreach(array(2,3,4,5,6) as $n){
            // XXX the current session is hardcoded in here!
            // needs to be defaulted programatically and saved in cookie!
            foreach(ClassInfo::model()->findAllBySql(
                "select class_info.* 
from class_info
where class_info.status = 'Active'
      and class_info.day_of_week = :wkd
      and class_info.session_id = $sess
order by class_info.start_time, class_info.class_name
; ",
                array('wkd' => $n,
                    'sess' => Yii::app()->params['currentSession']))
                    as $c)
            {
                $classes[$n][] = $c;
            }

        }
        

		$this->render('weekday',array(
                          'classes'=>$cf,
		));
	}

}
