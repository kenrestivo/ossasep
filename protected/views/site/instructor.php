<?php $this->pageTitle=Yii::app()->name;

$this->breadcrumbs = array() ;
// reset 
?>
<h1>After-School Enrichment Program – <?= $this->savedSessionSummary() ?></h1>



    <?php echo $this->renderPartial(
        '/instructor/signup_details', 
        array('instructor' => Instructor::model()->findByPk(Yii::app()->user->id))); 
?>


