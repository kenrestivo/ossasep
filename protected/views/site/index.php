<?php $this->pageTitle=Yii::app()->name;
$this->breadcrumbs = array() ;
// reset 
?>
<h1>Welcome to Ocean Shore ASEP</h2>

<?= CHtml::link("Check our Schedule", 
                 array("/report/weekday")); ?>


