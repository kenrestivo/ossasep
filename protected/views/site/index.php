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
(Note: you will have to log in to see all the admin stuff)
</p>
