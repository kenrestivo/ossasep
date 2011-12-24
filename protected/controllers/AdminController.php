<?php

class AdminController extends Controller
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
                  'users'=>array('admin'),
                ),
            // don't need deny since the wildcard is admin
            );
	}

    public function actionSignupsheet()
    {
        $cs = ClassSession::model()->findByPk(
            Yii::app()->params['currentSession']);
		$this->render(
            'signupsheet', 
            array(
                'classes' => $cs->active_classes));
    }


    //TODO: move this to the model, i'll use it elsewhere
    // i.e. classinfo::summarycounts

    public function signupStatus($c, $count)
    {

        if($c->active_mtg_count < 1){
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
        $s = ClassSession::model()->findByPk(
            Yii::app()->params['currentSession']);
        $cl = array();
        foreach($s->active_classes as $c){
            $cn = $c->attributes;
            $cn['totalcost'] = $c->costSummary;
            $cn['signups'] = $c->enrolled_count;
            $cn['waitlist'] = $c->waitlist_count;
            $cn['meetings'] = $c->active_mtg_count;
            $cn['signup_status']  = $this->signupStatus($c, $cn['signups']);
            $cl[] = $cn;
        }
        $dp = new KArrayDataProvider($cl);
        $dp->pagination = array('pageSize'=>100); //XXX stupid hack, TURN IT OFF!


        $this->render(
            'class_dashboard',
            array(
                'classes' => $dp,
                'cancelled' => new KArrayDataProvider($s->cancelled_classes)));
    }
}
