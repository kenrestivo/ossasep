<?php

class ToolsController extends Controller
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
                  'actions'=>array('autopopulate'),
                  'users'=>array('admin'),
                ),
			array('deny',  // deny all users
                  'users'=>array('*'),
                ),
            );
	}


    /*
      No gui fo rthis for now, who needs it
     */
    public function actionAutoPopulate()
    {
        foreach(
            ClassInfo::model()->findAllBySQL(
                "select * from class_info where session_id = :sess", 
                array('sess' => ClassSession::savedSessionId()))
                as $model)
        {
            if($model->active_mtg_count < 1){
                $model->populate_meetings(
                    Yii::app()->params['defaultNumMeetings']);
            }
        }

        //TODO: flash it!
        $this->redirect($this->redirect(Yii::app()->user->returnUrl));
    }
}
