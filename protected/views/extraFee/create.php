<?php
$this->breadcrumbs=array(
	'Extra Fees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ExtraFee', 'url'=>array('index')),
	array('label'=>'Manage ExtraFee', 'url'=>array('admin')),
);
?>

<h1>Create ExtraFee</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>