<?php

class CheckExpenseController extends Controller
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
			array('allow', // admin only
                  'actions'=>array(
                      'index', 'view', 'create', 'update', 
                      'admin','delete', 'autocompletepayer',
                      'autocompleteamount'),
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
		$model=new CheckExpense;


        // set the default session id if it isn't set in the search
        $model->session_id = ClassSession::savedSessionId();



		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CheckExpense']))
		{
			$model->attributes=$_POST['CheckExpense'];
			if($model->save())
				$this->redirect(array('index'));
		} else {
            // XXX why do i have to set defaults here, and default in rules doesn't cut it?
            $model->payer='OSS PTO';
        }


        if(isset($_GET['payee_id'])){
            $model->payee_id = $_GET['payee_id'];
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

		if(isset($_POST['CheckExpense']))
		{
			$model->attributes=$_POST['CheckExpense'];
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
		$model=new CheckExpense('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CheckExpense']))
			$model->attributes=$_GET['CheckExpense'];

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
				$this->_model=CheckExpense::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='check-expense-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAutocompletePayer()
    {
        if(isset($_GET['term'])){
            $c = Yii::app()->db->createCommand(
                "select payer from check_expense where payer like :text 
                    group by payer");
            
            echo CJSON::encode(
                array_map(
                    function($r) { return $r[0]; },
                    $c->queryAll(
                    false, 
                    array('text' => $_GET['term'] . '%'))));
            Yii::app()->end();
        }
        //TODO error out, 404?
    }

    public function actionAutocompleteAmount()
    {
        if(isset($_POST['CheckExpense'])){
            $i=Instructor::model()->findByPk($_POST['CheckExpense']['payee_id']);
            echo CJSON::encode($i->owed);
            Yii::app()->end();
        }
        //TODO error out, 404?

    }




}
