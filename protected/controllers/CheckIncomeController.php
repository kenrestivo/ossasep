<?php

class CheckIncomeController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
                  'actions'=>array('index','view'),
                  'users'=>array('*'),
                ),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
                  'actions'=>array('create','update'),
                  'users'=>array('@'),
                ),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
                  'actions'=>array('admin','delete', 'entry', 'multientry'),
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
		$model=new CheckIncome;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CheckIncome']))
		{
			$model->attributes=$_POST['CheckIncome'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['CheckIncome']))
		{
			$model->attributes=$_POST['CheckIncome'];
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
		$dataProvider=new CActiveDataProvider('CheckIncome');
		$this->render('index',array(
                          'dataProvider'=>$dataProvider,
                          ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CheckIncome('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CheckIncome']))
			$model->attributes=$_GET['CheckIncome'];

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
				$this->_model=CheckIncome::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

    public function actionEntry()
    {

        $form = new CForm('application.views.checkIncome.entry_form');
        $form['check']->model = new CheckIncome;
        $form['income']->model = new Income('check');
        if($form->submitted('entry_form')){
            // now the saving!
            $check = $form['check']->model;
            $check->incomes = array($form['income']->model);
 
            if($check->withRelated->save(true, array('incomes')))
            {
                $this->redirect(array('view','id'=> $form['check']->model->id));
            } 
        }

        $this->render('entry', array('form'=>$form));

    }


    public function actionMultiEntry()
    {
		$model=new CheckIncome;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CheckIncome']))
		{
            //TODO: save this stuff
		}

        $income = array();
		if(isset($_GET['student_id'])){
            $stu = Student::model()->findByPk($_GET['student_id']);
            foreach($stu->owed as $owed){
                $inc=new Income();
                $inc->student_id = $stu->id;
                $inc->class_id = $owed['class']->id;
                $inc->amount = $owed['amount'];
                $income[] =  $inc;
            }
        }

		$this->render('multientry',array(
                          'model'=>$model,
                          'income' => $income
                          ));


    }

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='check-income-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
