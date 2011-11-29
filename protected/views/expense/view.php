<?php
$this->breadcrumbs=array(
	'Expenses'=>array('index'));

$this->menu=array(
	array('label'=>'List Expense', 'url'=>array('index')),
	array('label'=>'Create Expense', 'url'=>array('create')),
	array('label'=>'Update Expense', 
          'url'=>array('update', 
                       'instructor_id'=>$model->instructor_id,
                       'check_id' => $model->check_id)),
	array('label'=>'Delete Expense', 'url'=>'#', 
          'linkOptions'=>array(
              'submit'=>array('delete', 
                              'instructor_id'=>$model->instructor_id,
              'check_id' => $model->check_id),
              'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Expense', 'url'=>array('admin')),
);
?>

<h1>View Expense </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                            'instructor.full_name',
                            'check.amount',
                            'check.payer',
                            'check.payee.full_name',
                            'check.check_num',
                            'check.check_date',
                            'delivered',
                            'amount',
	),
)); ?>
