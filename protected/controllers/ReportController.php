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
			array('allow', 
                  // all
                  'users'=>array('admin'),
                ),
			array('allow', 
                  /// XXX note this miserable hack!
                  'actions'=> array('signupspublic'),
                  'users'=>array('*'),
                ),
			array('allow',  // public pages
                  'actions'=> array('weekday', 'signupboxes', 'descriptions'),
                  'users'=>array('*'),
                ),
			array('deny',  // deny all users
                  'users'=>array('*'),
                ),
            );
	}

	public function actionWeekday()
	{
        $days= range(2,6);

        $c=ClassInfo::findAllWeekdays($days,
                                      ClassSession::savedSessionId());
		$this->render('weekday',
                      array(
                          'classes'=>$c,
                          'days'=> $days,
                          ));
	}

    public function actionSignupBoxes()
    {
        $cs = ClassSession::model()->findByPk(
            ClassSession::savedSessionId());


        // ugly, but it works
        $ac=$cs->active_classes;
        $half = round(count($ac)/2);
        $classes=array(
            array_slice($ac, 0, $half),
            array_slice($ac,$half));

		$this->render(
            'signupboxes', 
            array(
                'classes' => $classes));
    }


    public function actionDescriptions()
    {
        $cs = ClassSession::model()->findByPk(
            ClassSession::savedSessionId());
		$this->render(
            'descriptions', 
            array(
                'classes' => $cs->active_classes));
                    
    }

/*
  XXX THIS miserable hack is the reason why i have to redo the homepage
  and permissions dispatch. the redirects are stupid. stop this.
  use partialss. use something. ugh.

  XXX also, seriously, wtf? why is this in report controller? WRONG.
*/


    private function redirectHack()
    {
        if(isset(Yii::app()->user->role) 
           && Yii::app()->user->role == 'instructor'){
            $this->redirect(array('/site/index'));
        }

        if(Yii::app()->user->name == 'office'){
            $this->redirect(array('/site/index'));
        }
        
        /// XXX NOTE ERRROR! Implicitly anyone who is not a guest gets in!
        
        if(Yii::app()->user->isGuest){
            Yii::app()->user->setReturnUrl( Yii::app()->request->requestUri);
            $this->redirect(array('/site/login'));
        }

    }

    public function actionSignupsPublic()
    {

        $this->redirectHack();

        $days= range(2,6);

        $c=ClassInfo::findAllWeekdays($days,
                                      ClassSession::savedSessionId());

		$this->render(
            'signups_public', 
            array(
                'classes' => $c,
                'days'=> $days,
                ));
    }




}
