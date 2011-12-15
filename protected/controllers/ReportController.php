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
		$this->render(
            'signupboxes', 
            array(
                'classes' => ClassInfo::activeClasses(
                    Yii::app()->params['currentSession'])));
    }


    public function actionDescriptions()
    {
		$this->render(
            'descriptions', 
            array(
                'classes' => ClassInfo::activeClasses(
                    Yii::app()->params['currentSession'])));
    }


    public function actionSignupsheet()
    {
		$this->render(
            'signupsheet', 
            array(
                'classes' => ClassInfo::activeClasses(
                    Yii::app()->params['currentSession'])));
    }

    public function actionClassDashboard()
    {
        $cl = array();
        foreach(ClassInfo::activeClasses(
                    Yii::app()->params['currentSession']) as $c){
            $cn = $c->attributes;
            $cn['totalcost'] = $c->costSummary;
            $cn['signups'] = count(array_filter(
                $c->signups, 
                function($s){ return $s->status == 'Enrolled'; }));
            $cn['waitlist'] = count(array_filter(
                $c->signups, 
                function ($v) { return $v->status == 'Waitlist'; }));
            $cn['meetings'] = count($c->active_meetings);
            if($cn['signups'] < $c->min_students){
                $cn['status'] = 'Under limit by '. $c->min_students - $cn['signups'];
            }
            if($cn['signups'] >= $c->max_students){
                $cn['status']  = 'Class Full';
            }
            if($cn['meetings'] < 1){
                $cn['status']  = 'No meeting dates entered!';
            }
            $cl[] = $cn;
        }

        $this->render(
            'class_dashboard',
            array('classes' => $cl));
    }
}
