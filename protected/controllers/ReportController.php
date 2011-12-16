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


    public function signupStatus($c, $count)
    {

        if(count($c->active_meetings) < 1){
            return 'No meeting dates!';
        } elseif($count < 1){
            return 'No signups yet.';
        } elseif($count < $c->min_students){
            return 'Needs min '. $c->min_students . ' students';
        } elseif($count >= $c->max_students){
            return 'Class Full';
        } else {
            return'OK';
        }

    }



    public function actionClassDashboard()
    {
        $cl = array();
        foreach(ClassInfo::activeClasses(
                    Yii::app()->params['currentSession']) as $c){
            $cn = $c->attributes;
            $cn['totalcost'] = $c->costSummary;
            $cn['signups'] = count(
                array_filter(
                    $c->signups, 
                    function($s){ return $s->status == 'Enrolled'; }));
            $cn['waitlist'] = count(
                array_filter(
                    $c->signups, 
                    function ($v) { return $v->status == 'Waitlist'; }));
            $cn['meetings'] = count($c->active_meetings);
            $cn['signup_status']  = $this->signupStatus($c, $cn['signups']);
            $cl[] = $cn;
        }
        $dp = new KArrayDataProvider($cl);
        $dp->pagination = array('pageSize'=>100); //XXX stupid hack, TURN IT OFF!
        $this->render(
            'class_dashboard',
            array('classes' => $dp));
    }
}
