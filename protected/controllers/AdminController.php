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
     (if(signup.status = 'Cancelled', 0,
        (class_info.cost_per_class * meeting.meetings) +
           if(fees.total is null, 0, fees.total))
       -  if(income_summary.paid is null, 0, income_summary.paid)) as total_owed,
     signup.*
from student
left join signup
     on student.id = signup.student_id
          and signup.scholarship < 1
left join class_info
     on class_info.id = signup.class_id
     and class_info.session_id = :sid
left join (select count(class_meeting.id) as meetings,
     class_meeting.class_id as class_id
     from class_meeting
     where  class_meeting.makeup < 1
     group by class_meeting.class_id
     ) as meeting
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
        /*
          I hate you, PHP.
         */
        $sucks=(explode(':',Yii::app()->db->connectionString));
        $sucks2=explode(';',$sucks[1]);
        foreach($sucks2 as $s){
            $sucks3=explode('=',$s);
            $cs[$sucks3[0]] = $sucks3[1];
        }


        // blast out the thing and let's do this.
        header('Content-Type: application/octet-stream');

        //today
        header(
            sprintf('Content-Disposition: attachment;filename="%s.sql.bz2"',
                    Yii::app()->params['backupname'] . '-' . date('YmdHis')));
        header('Cache-Control: max-age=0');

        system(
            sprintf('%s -h %s -u%s -p%s %s 2>/dev/null | %s -c',
                    Yii::app()->params['mysqldump'],
                    $cs['host'],
                    Yii::app()->db->username,
                    Yii::app()->db->password,
                    $cs['dbname'],
                    Yii::app()->params['bzip2']
                ));
        Yii::app()->end();
    }

}
