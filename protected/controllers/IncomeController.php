<?php

class IncomeController extends Controller
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
			array('allow', // adminonly
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
        $amount_remaining = null; // used later on

		$model=new Income;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Income']))
		{
			$model->attributes=$_POST['Income'];
			if($model->save())
				$this->redirect(array('view',
                                      'student_id'=>$model->student_id,
                                      'class_id'=>$model->class_id,
                                      'check_id'=>$model->check_id));
		}

        if(isset($_GET['class_id'])){
            $model->class_id = $_GET['class_id'];

            // prepopulating amount doing this here instead of rules
            if(!isset($this->amount)){
                $model->amount =  $model->class->costSummary;
            }
        }

        if(isset($_GET['student_id'])){
            $model->student_id = $_GET['student_id'];
        }

        if(isset($_GET['check_id']) ){
            $model->check_id = $_GET['check_id'];
            // note magic, this fetches the moddel from the db
            $amount_remaining =  $model->check->unassigned;
            // note the magic  here, only if check id above doesn't set amount
            if($model->amount < 0){
                $model->amount = $amount_remaining;
            }
        }

		$this->render('create',array(
                          'model'=>$model,
                          'remaining' => $amount_remaining,
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

		if(isset($_POST['Income']))
		{
			$model->attributes=$_POST['Income'];
			if($model->save())
				$this->redirect(array('view',
                                      'student_id'=>$model->student_id,
                                      'class_id'=>$model->class_id,
                                      'check_id'=>$model->check_id));
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
		$dataProvider=new CActiveDataProvider('Income');
		$this->render('index',array(
                          'dataProvider'=>$dataProvider,
                          ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Income('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Income']))
			$model->attributes=$_GET['Income'];

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
			if(isset($_GET['student_id']) && isset($_GET['check_id'])
               && isset($_GET['class_id']))
                // XXX this is stupid and tedious. fix.
				$this->_model=Income::model()->findbyPk(
                    array(
                        'student_id' => $_GET['student_id'],
                        'check_id' =>$_GET['check_id'],
                        'class_id' =>$_GET['class_id']
                        ));
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='income-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
