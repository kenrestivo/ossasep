<?php

class ClassInfoController extends Controller
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
		$model=new ClassInfo;

        // set the default session id if it isn't set in the search
        $model->session_id = ClassSession::savedSessionId();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

        // set the default session id if it isn't set in the search
        $model->session_id = ClassSession::savedSessionId();

		if(isset($_POST['ClassInfo']))
		{
			$model->attributes=$_POST['ClassInfo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
        // handle single-endeds, gah!!
        if(isset($_GET['session_id'])){
            $model->session_id = $_GET['session_id'];
        }

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If updte is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['ClassInfo']))
		{
			$model->attributes=$_POST['ClassInfo'];
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
		$model=new ClassInfo('search');
		$model->unsetAttributes();  // clear any default values
        // set the default session id if it isn't set in the search
        $model->session_id = ClassSession::savedSessionId();
		if(isset($_GET['ClassInfo']))
			$model->attributes=$_GET['ClassInfo'];

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
				$this->_model=ClassInfo::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	public function actionPopulate()
	{
        $model = $this->loadModel();
        $model->populate_meetings(
            isset($_POST['num']) ? $_POST['num'] : Yii::app()->params['defaultNumMeetings']);
        $this->redirect(array('view','id'=>$model->id));
	}



	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='class-info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



    public function instructorSplitSummary()
    {
        $un = $this->_model->instructor_discrepancy;
        $res = Yii::app()->format->percent($this->_model->instructor_percent) . ' assigned';
        if($un != 0){
            $res .= ' (' .Yii::app()->format->percent($un). ' discrepancy)';
        }
        return $res;
    }

	/**
	 * Gives the class status as json
	 */
	public function actionJson()
	{

        $model = ClassInfo::model()->findByPk($_POST['Signup']['class_id']);
        echo CJSON::encode(
            array('min_grade_allowed' => $model->min_grade_allowed,
                  'max_grade_allowed' => $model->max_grade_allowed,
                  'min_students' => $model->min_students,
                  'max_students' => $model->max_students,
                  'cost_per_class' => $model->cost_per_class,
                  'enrolled_count' => $model->enrolled_count,
                               )
            );
	}

    public function actionChooseCopy()
    {

		if(isset($_POST['ClassInfo'])){

            // do it

            if(isset($_GET['returnTo'])){
                $this->redirect($_GET['returnTo']);
            }
        }
        
		$this->render(
            'choose_copy'
                );

   
    }


    public function actionCopy()
    {
                
    }

}

?>