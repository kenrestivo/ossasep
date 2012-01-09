<?php $this->pageTitle=Yii::app()->name;

$this->breadcrumbs = array() ;
// reset 


$instructor = Instructor::model()->findByPk(Yii::app()->user->id); 

?>
<h1>After-School Enrichment Program – <?= $this->savedSessionSummary() ?></h1>


    <?php echo $this->renderPartial(
        '/instructor/_requirement_status', 
        array('model' => $instructor));
?>

    <?php echo $this->renderPartial(
        '/instructor/signup_details', 
        array('instructor' => $instructor));
?>


