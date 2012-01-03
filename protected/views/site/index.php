<?php $this->pageTitle=Yii::app()->name;

$this->breadcrumbs = array() ;
// reset 
?>
<h1>After-School Enrichment Program – <?= $this->savedSessionSummary() ?></h1>

    <h3>Classes begin <strong><?= date('F jS', strtotime(ClassSession::current()->start_date)) ?></strong>.</h3>
    <!-- TODO: make the reservation begin date dynamically generated -->
<h3>Reservations begin <strong>Wednesday, January 4th at 8am</strong>!</h3>


<p>
<?= CHtml::link("Class Schedule", 
                 array("/report/weekday")); ?>
</p>

<p>
<?= CHtml::link("Class Descriptions", 
                 array("/report/descriptions")); ?>
</p>


<p>
<?php echo $this->renderPartial('/report/_signup_form'); ?>
</p>


<p>
<?= CHtml::link("Current Signup Status", 
                 array("/Report/signupsPublic")); ?>
 (Requires login)
</p>
