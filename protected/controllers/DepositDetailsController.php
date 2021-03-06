<?php

class DepositDetailsController extends Controller
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
			array('allow', // admin only
                  'users'=>array('admin'),
                ),
			array('deny',  // deny all users
                  'users'=>array('*'),
                ),
            );
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
                          'model'=>$this->loadModel(),
                          ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DepositDetails;

        // set the default session id if it isn't set in the search
        $model->session_id = ClassSession::savedSessionId();


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DepositDetails']))
		{
			$model->attributes=$_POST['DepositDetails'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		} else {
            // only if this is NOT yet entered
            $model->deposited_date = date ("Y-m-d");
        }

		$this->render('create',array(
                          'model'=>$model,
                          ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DepositDetails']))
		{
			$model->attributes=$_POST['DepositDetails'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
                          'model'=>$model,
                          ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->actionAdmin(); // brute force
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DepositDetails('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DepositDetails']))
			$model->attributes=$_GET['DepositDetails'];

		$this->render('admin',array(
                          'model'=>$model,
                          ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=DepositDetails::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='deposit-details-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionPopulateChecks()
	{
        $model = $this->loadModel();
        $model->populate('check');
        $this->redirect(array('view','id'=>$model->id));
	}

	public function actionPopulateCash()
	{
        $model = $this->loadModel();
        $model->populate('cash');
        $this->redirect(array('view','id'=>$model->id));
	}



	public function actionPrint()
	{
		$this->render('printable',array(
                          'model'=>$this->loadModel(),
                          ));
	}


    public function actionUnassignAll($type='cash'){
        $model = $this->loadModel();
        $r = $type == 'cash' ? $model->cash : $model->checks;
        foreach($r as $c){
            $c->deposit_id = null;
            $c->save();
        }
        $this->redirect(array('view','id'=>$model->id));
    }
    
}
