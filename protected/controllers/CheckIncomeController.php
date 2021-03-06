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

        // set the default session id if it isn't set in the search
        $model->session_id = ClassSession::savedSessionId();


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CheckIncome']))
		{
			$model->attributes=$_POST['CheckIncome'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		} else {
            if(isset($_GET['company_id'])){
                $model->payee_id = $_GET['company_id'];
            }
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
		// we only allow deletion via POST request
		if(Yii::app()->request->isPostRequest)
		{

			// First make sure there's no existing foreign keys.
			$c = Yii::app()->db->createCommand(
				"select  count(income.check_id) as no_no_count
from income
where income.check_id = :cid");
			$r=$c->queryRow(true, array('cid' => $this->loadModel()->id));
			if($r['no_no_count'] > 0){
				throw new CHttpException(
					400,
					"You cannot delete a check that has been used to pay for a class. You must first delete all payment assignments made for this class.");
			}



/*
  Hmm, this seems like a good idea, but not sure.

			if ($this->loadModel()->deposit_id > 0){
				throw new CHttpException(
					400,
					"You also can't delete a check that's been deposited already either. Sorry, that'd be bad.");
			}
*/



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


/* 
   This was an unused experiment for a single-entry.
   It's mostly cruft now. Get rid of it?
*/

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

/* 
   this function ought to be taken out and shot
*/

    public function actionMultiEntry()
    {
		$model=new CheckIncome;
        // set default correctly
        $model->session_id = ClassSession::savedSessionId();
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


    public function actionEditable()
    {
        $models = CheckIncome::model()->findAllBySQL(
            'select check_income.* from check_income 
where (payer is null or payer < "")
order by abs(check_num)');
		$this->render('editable',array(
                          'models'=>$models,
                          ));
        
    }

    /*
      Because I am tired of fighting with json and jquery.
    */
    public function postLoadModel()
    {
		if($this->_model===null)
		{
			if(isset($_POST['CheckIncome']) && $_POST['CheckIncome']['id']){
                //NASTY HACK AROUND HTML NOT HANDLING NUMERIC DIV IDS!
                $pkmangle = str_replace('check_id_', '', $_POST['CheckIncome']['id']);
                $this->_model=CheckIncome::model()->findbyPk($pkmangle);
            }
			if($this->_model===null){
				throw new CHttpException(404,'The requested page does not exist.');
            }
        }
        return $this->_model;

    }

    public function actionJsonUpdate()
    {
        $model=$this->postLoadModel();

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if(isset($_POST['CheckIncome']))
        {
            //XXX try massively assigning with safe mode!
            $model->payer = $_POST['CheckIncome']['payer'];

            if($model->save()){
                echo CHtml::encode($model->payer);
            } else {
                echo "error";
            }
        } else {
            echo "You rang?";
        }
        Yii::app()->end();

    }


/*
  finds all the as-yet-undeposited, as-yet-undelievered checks 
  for possible deposit inclusion
*/
    public function actionCheckNumAC()
    {
        if(isset($_GET['term'])){
            $c = CheckIncome::model()->findAllBySQL(
				"select check_income.* from check_income where
(check_num like :text 
or payer like :text)
and session_id = :sid
and cash < 1
and (deposit_id is null or deposit_id < 1)
and (delivered is null or delivered < '2000-01-01')
and (returned is null or returned < '2000-01-01')
order by abs(check_num)
",
				// this is where i put the %'s in
				// because PDO quotes my :text
				array('text' => '%' .$_GET['term'] . '%',
					  'sid' => ClassSession::savedSessionId()));
            
            echo CJSON::encode(
                array_map(
                    function($r) { 
                        return array(
                            'other' => $r->amount,
                            'label' => $r->summary,
                            'value' => $r->id); },
                    $c));

            Yii::app()->end();
        }
        //TODO error out, 404?
    }


    /*
      NOTE: this takes a normal ajax GET request
	*/
    public function actionUnDeposit()
    {
        $this->loadModel();
        $this->_model->deposit_id = null;
        $this->_model->save();
        Yii::app()->end();
    }


/*
  since this is coming from a jquery autoocomplete,
  it has got its id posted, so we use postloadmodel here
*/

    public function actionDeposit()
    {
        $this->postLoadModel();
        $this->_model->attributes = $_POST['CheckIncome'];
        $this->_model->save();
        Yii::app()->end();
    }



}
