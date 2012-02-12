<?php $this->pageTitle=Yii::app()->name;

$this->breadcrumbs = array() ;
// reset 


$instructor = Instructor::model()->findByPk(Yii::app()->user->id); 

?>
<h1>After-School Enrichment Program – <?= CHtml::encode($this->savedSessionSummary()) ?></h1>

    <h3>Instructor Requirements Status for <?= CHtml::encode($instructor->full_name) ?> </h3>
    <?php echo $this->renderPartial(
        '/instructor/_requirement_status', 
        array('model' => $instructor));
?>

    <?php echo $this->renderPartial(
        '/instructor/signup_details', 
        array('instructor' => $instructor));
?>


