<?php
$this->breadcrumbs=array(
	'Check Incomes'=>array('index'),
	'Create',
);

?>

<h1>Create Check (Received)</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>