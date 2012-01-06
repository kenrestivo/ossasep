<?php

class SignupController extends Controller
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
		$model=new Signup;


		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Signup']))
		{
			$model->attributes=$_POST['Signup'];
			if($model->save())
				$this->redirect(array('view',
                                      'student_id'=>$model->student_id,
                                      'class_id'=>$model->class_id));
		} else {
            // only if this is NOT yet entered
            $model->signup_date = date ("Y-m-d H:i:s");
        }

        if(isset($_GET['student_id'])){
            $model->student_id = $_GET['student_id'];
        }
        if(isset($_GET['class_id'])){
            $model->class_id = $_GET['class_id'];
            // check for waitlist
            if($model->class->full){
                $model->status = "Waitlist";
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
		$this->performAjaxValidation($model);

		if(isset($_POST['Signup']))
		{
			$model->attributes=$_POST['Signup'];
			if($model->save())
				$this->redirect(array('view',
                                      'student_id'=>$model->student_id,
                                      'class_id'=>$model->class_id));
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
		$dataProvider=new CActiveDataProvider('Signup');
		$this->render('index',array(
                          'dataProvider'=>$dataProvider,
                          ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Signup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Signup']))
			$model->attributes=$_GET['Signup'];

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
			if(isset($_GET['student_id']) && isset($_GET['class_id']))
                // XXX this is stupid and tedious. fix.
				$this->_model=Signup::model()->findbyPk(
                    array(
                        'student_id' => $_GET['student_id'],
                        'class_id' =>$_GET['class_id'])
                    );
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='signup-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionCreateMulti()
    {

        // ugly hack, but i need it
        $student = Student::model()->findByPk($_GET['student_id']);

        if($student===null){
            throw new CHttpException(404,'The requested page does not exist.');
        }
        
        // TODO: possibly double-end this with handling class id
        
        $models = array();
        $flash = "";

		if(isset($_POST['Signup'])){
            // the saving and redisplaying
            $v= true;
            foreach($_POST['Signup'] as $i => $s){
                // I'm not bothering with them if the class is 0, ignore
                if($_POST['Signup'][$i]['class_id'] > 0){
                    $models[$i] = new Signup;
                    $models[$i]->attributes = $_POST['Signup'][$i];
                    // XXX ugly, but cleaner than hidden form fields i think.
                    $models[$i]->student_id = $student->id; 
                    if($models[$i]->save()){
                        $v= $v && true;
                        $flash .= CHtml::encode($models[$i]->class->summary) . ' succeeded for ' . CHtml::encode($models[$i]->student->summary) . "<br />";
                        // don't need to keep it around if it validated
                        // this is important for when one line fails
                        unset($models[$i]);
                    } else {
                        // something died
                        $v= $v && false;
                    }
                }
            }
            Yii::app()->user->setFlash('success', $flash);
            
            if($v){
                //everything validated and saved, so redirect us
                $this->redirect(array('student/view','id'=> $student->id));
            }


        } else {

            // create new form
            $count = isset($_POST['count']) ? $_POST['count'] : 2;
            

            for($i = 0; $i < $count; $i++){
                $models[$i] = new Signup;
                $models[$i]->student_id = $student->id; // pre-fill it
                $models[$i]->signup_date = date ("Y-m-d H:i:s");
            }
        }

        $this->render('multi_entry',
                      array('student' => $student,
                            'models' => $models));
        
    }

}
