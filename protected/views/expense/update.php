<?php
$this->breadcrumbs=array(
	'Expenses'=>array('index'),
	'Edit',
    );


$this->menu=array(
	array('label'=>'List Expense', 'url'=>array('index')),
	array('label'=>'Create Expense', 'url'=>array('create')),
	array('label'=>'View Expense', 'url'=>array('view', 'instructor_id'=>$model->check_id, 'check_id' => $model->check_id)),
	array('label'=>'Manage Expense', 'url'=>array('admin')),
);
?>

<h1>Update Expense <?php echo $model->instructor->full_name. " " . $model->check->check_date  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>