<?php
$this->breadcrumbs=array(
	'Class Dashboard'=>array('class_dashboard'),
	'Dashboard',
);
?>

<h3>Active classes for <?= CHtml::encode(ClassSession::current()->summary) ?></h3>


<?php    $this->renderPartial(
    '_dashboard',
    array('classes' =>$classes,
          'id' => 'active-classses-grid'));
?>


<h3>Cancelled classes for <?= CHtml::encode(ClassSession::current()->summary) ?></h3>
<?php    $this->renderPartial(
    '_dashboard',
    array('classes' =>$cancelled,
          'id' => 'cancelled-classses-grid'));
?>


