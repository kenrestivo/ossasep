<?php
$this->breadcrumbs=array(
	'Checks Paid'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Checks Paid', 'url'=>array('admin')),
);
?>

<h1>Create Check Paid</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>