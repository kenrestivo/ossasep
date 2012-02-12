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
			array('allow',  
                  'actions'=>array('signupsheet'),
                  'users'=>array('patricia'),
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

    public function actionStudentFinancial()
    {
        $s = Student::model()->findAllBySql(
            "select student.*
 from student
 left join signup
     on signup.student_id = student.id
 left join class_info
     on class_info.id = signup.class_id
 where  class_info.session_id = :sid
        and signup.class_id is not null
 group by student.id
 order by student.first_name asc, student.last_name asc",
            array('sid' =>
                  ClassSession::savedSessionId()));
        $this->render(
            'student_financial',
            array(
                'models' => $s));

    }


    public function actionDunningReport()
    {
        $s = Signup::model()->findAllBySql(
            "select
     (if(signup.status != 'Enrolled', 0,
        (class_info.cost_per_class * meeting.meetings) +
           coalesce(fees.total,0))
       -  coalesce(income_summary.paid, 0)) as total_owed,
     signup.*
from signup
left join student
  on student.id = signup.student_id
left join class_info
  on class_info.id = signup.class_id
     and class_info.session_id = :sid
left join (select count(class_meeting.id) as meetings,
     class_meeting.class_id as class_id
     from class_meeting
     where  class_meeting.makeup < 1
     group by class_meeting.class_id) 
     as meeting
  on signup.class_id = meeting.class_id
left join (
    select sum(extra_fee.amount) as total,
    extra_fee.class_id as class_id
    from extra_fee
    group by extra_fee.class_id
    )
   as fees
     on signup.class_id = fees.class_id
left join (
     select sum(income.amount) as paid ,
     income.class_id as class_id,
     income.student_id as student_id
     from income
     left join check_income
        on check_income.id = income.check_id
        and (check_income.returned is null
                   or check_income.returned < '2000-01-01')
     group by income.class_id, income.student_id)
     as income_summary
 on signup.class_id = income_summary.class_id
      and signup.student_id = income_summary.student_id
where signup.class_id is not null
      and signup.student_id is not null
       and signup.scholarship < 1
        and signup.status = 'Enrolled'
group by signup.class_id, signup.student_id
having total_owed != 0
order by student.first_name, student.last_name, class_info.class_name
",
            array(
                'sid' =>
                ClassSession::savedSessionId()));
        $this->render(
            'dunning_report',
            array(
                'results' => $s));

    }

    public function actionBackup()
    {
        Yii::app()->request->redirect(
            Yii::app()->baseUrl . Yii::app()->params['backup_url']);

    }


    public function actionIntegrityCheck()
    {
        $unassigned = CheckIncome::model()->findAllBySql(
"select check_income.*
from check_income
left join  (select sum(income.amount) as total, 
                   income.check_id as check_id
           from income
           group by income.check_id) as assigned
on assigned.check_id = check_income.id
where coalesce(assigned.total,0) != coalesce(check_income.amount,0)
and (check_income.returned is null or check_income.returned < '2000-01-01')
and check_income.session_id = :sid
",
array('sid' =>             ClassSession::savedSessionId()            ));



        $instructorbalance = ClassInfo::model()->findAllBySql(
"select class_info.*
from class_info
left join  (select sum(instructor_assignment.percentage) as total, 
                   instructor_assignment.class_id as class_id
           from instructor_assignment
           group by instructor_assignment.class_id) as assigned
on assigned.class_id = class_info.id
where coalesce(assigned.total,0) != 100
and class_info.session_id = :sid
",
array('sid' =>             ClassSession::savedSessionId()            ));

        $this->render(
            'integrity_check',
            array(
                'unassigned' => $unassigned,
                'instructorbalance' => $instructorbalance,
                ));
        

    }

}
