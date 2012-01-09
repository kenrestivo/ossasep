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
		$this->render(
            'signupboxes', 
            array(
                'classes' => $cs->active_classes));
                    
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


    private function redirectHack()
    {
        if(isset(Yii::app()->user->role) 
                 && Yii::app()->user->role == 'instructor'){
            $this->redirect(array('/site/index'));
        }

        if(Yii::app()->user->role == 'office'){
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
