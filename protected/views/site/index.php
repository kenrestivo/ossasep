<?php $this->pageTitle=Yii::app()->name;

$this->breadcrumbs = array() ;
// reset 
?>
<h1>Welcome to Ocean Shore ASEP</h2>
<p>
<?= CHtml::link("Check our Schedule", 
                 array("/report/weekday")); ?>
</p>

<p>
<?= CHtml::link("Check our Descriptions", 
                 array("/report/descriptions")); ?>
</p>


<p>
<?= CHtml::link(CHtml::encode("Signup Form (PDF)"), 
                Yii::app()->baseUrl . "/static/Winter2012Signupform.pdf"); ?>
</p>


<p>
<?= CHtml::link("Current Signup Status", 
                 array("/Report/signupsPublic")); ?>
 (Requires login)
</p>
