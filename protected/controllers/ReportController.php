<?php

class ReportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
        $days= range(2,6);

        $c=ClassInfo::findAllWeekdays($days,
                                      Yii::app()->params['currentSession']);
		$this->render('weekday',
                      array(
                          'classes'=>$c,
                          'days'=> $days,
                          ));
	}

    public function actionSignupBoxes()
    {
		$this->render('signupboxes', 
                      array(
                          'classes' => ClassInfo::activeClasses(
                              Yii::app()->params['currentSession'])));
    }

}
