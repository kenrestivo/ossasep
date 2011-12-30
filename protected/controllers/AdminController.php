<?php

class AdminController extends Controller
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
                  'users'=>array('admin'),
                ),
			array('deny',  // deny all users
                  'users'=>array('*'),
                ),
            );
	}

    public function actionSignupsheet()
    {
        $cs = ClassSession::model()->findByPk(
            ClassSession::savedSessionId());
		$this->render(
            'signupsheet', 
            array(
                'classes' => $cs->active_classes));
    }





    public function actionClassDashboard()
    {
        $s = ClassSession::model()->findByPk(
            ClassSession::savedSessionId());
        
        $this->render(
            'class_dashboard',
            array(
                'classes' => $s->active_classes,
                'cancelled' => $s->cancelled_classes));
    }


    public function actionOSSPTOInstructorPayments()
    {

        // TODO:: move this find to the model perhaps, may need it elsewhere?
        $this->render(
            'osspto_instructors',
            array(
                'instructors' => ClassSession::current()->osspto_instructors));
        
    }

    public function actionInstructorRequirements()
    {

        // TODO:: move this find to the model perhaps, may need it elsewhere?
        $this->render(
            'instructor_paperwork',
            array(
                'instructors' => ClassSession::current()->instructors));
        
    }


    public function actionScholarships()
    {
        $s = Signup::model()->findAllBySql(
            "select signup.*
from signup
left join class_info
   on class_info.id = signup.class_id
left join student
   on signup.student_id = student.id
where class_info.status != 'Cancelled'
    and signup.status != 'Cancelled'
    and signup.scholarship > 0
order by student.last_name asc, student.first_name asc
",
            array('sid' =>
                  ClassSession::savedSessionId()));
        
        $this->render(
            'scholarships',
            array(
                'model' => $s));
    }



}
