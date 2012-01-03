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
			array('allow', // admin only
                  'actions'=>array('index', 'view', 'create', 'update', 
                                   'admin','delete', 'entry', 'multientry',
                                   'autocomplete', 'multiupdate'),
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
        $this->actionAdmin(); // brute force
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
        $income = array();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CheckIncome'])){
            // note it overrides session_id if it's in the post
			$model->attributes=$_POST['CheckIncome'];
            //saving, so populate from the form now
            if(isset($_POST['Income'])){
                foreach($_POST['Income'] as $i){
                    // don't save 0 ones at all
                    if((int)$i['amount'] > 0){
                        $inc=new Income('check');
                        $inc->attributes =  $i;
                        $income[] = $inc;
                    }
                }
                $model->incomes = $income;
            }            

            if($model->withRelated->save(true, array('incomes')))
            {
                $this->redirect(array('view','id'=> $model->id));
            } 

		} else {
            /* construct form, and pre-populate some important data,
              like, what is owed
             */
            if(isset($_GET['company_id'])){
                $model->payee_id = $_GET['company_id'];
            }
            // this is the special stuff that pre-populates the
            // items owed, so they can be edited
            if(isset($_GET['student_id'])){
                $total = 0;
                $stu = Student::model()->findByPk($_GET['student_id']);
                foreach($stu->owed as $owed){
                    // TODO: do this in a more yii-ish, ar-ish criteria way
                    if($owed['payee']->id == $model->payee_id){
                        $inc=new Income();
                        // pre populate it
                        $inc->student_id = $stu->id;
                        $inc->class_id = $owed['class']->id;
                        $inc->amount = $owed['amount'];
                        $income[] =  $inc;
                        $total += $owed['amount'];
                    }
                }
                $model->amount = $total;
            }


        }


		$this->render('multientry',array(
                          'model'=>$model,
                          'income' => $income
                          ));


    }


    public function actionMultiUpdate()
    {
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CheckIncome'])){
            // note it overrides session_id if it's in the post
			$model->attributes=$_POST['CheckIncome'];
            //saving, so populate from the form now
            if(isset($_POST['Income'])){
                foreach($_POST['Income'] as $i){
                    // don't save 0 ones at all
                    if((int)$i['amount'] > 0){
                        $inc=new Income('check');
                        $inc->attributes =  $i;
                        $income[] = $inc;
                    }
                }
                $model->incomes = $income;
            }            

            if($model->withRelated->save(true, array('incomes')))
            {
                $this->redirect(array('view','id'=> $model->id));
            } 


        }


		$this->render('multientry',array(
                          'model'=>$model,
                          /* XXX hack, this shouldn' tbe necessary
                             but the multientry treats them separately.
                             i need to make mutientry use $model->income.
                             meantime, this stays.
                          */
                          'income' => $model->incomes
                          ));


    }





    public function actionAutocomplete()
    {
        if(isset($_GET['term'])){
            $c = Yii::app()->db->createCommand(
                "select payer from check_income where payer like :text 
                    group by payer");
            
            echo CJSON::encode(
                array_map(
                    function($r) { return $r[0]; },
                    $c->queryAll(
                    false, 
                    // this is where i put the %'s in
                    // because PDO quotes my :text
                    array('text' => '%' .$_GET['term'] . '%'))));
            Yii::app()->end();
        }
        //TODO error out, 404?
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

    public function splitSummary()
    {
        $un = $this->_model->unassigned;
        $res = Yii::app()->format->currency($this->_model->assigned) . ' assigned of ' . Yii::app()->format->currency($this->_model->amount) . ' total';
        if($un != 0){
            $res .= ' (' .Yii::app()->format->currency($un). ' discrepancy)';
        }
        return $res;
    }


}
