<?php
$this->breadcrumbs=array(
	'Incomes'=>array('index'));

$this->menu=array(
	array('label'=>'List Income', 'url'=>array('index')),
	array('label'=>'Create Income', 'url'=>array('create')),
	array('label'=>'Update Income', 
          'url'=>array('update', 
                       'student_id'=>$model->student_id,
                       'class_id'=>$model->class_id,
                       'check_id' => $model->check_id)),
	array('label'=>'Delete Income', 'url'=>'#', 
          'linkOptions'=>array(
              'submit'=>array('delete', 
                              'student_id'=>$model->student_id,
                              'class_id'=>$model->class_id,
                              'check_id' => $model->check_id),
              'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Income', 'url'=>array('admin')),
    );
?>

<h1>View Income </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                            'student.full_name',
                            'check.amount',
                            'check.payer',
                            'check.payee',
                            'check.check_num',
                            'check.check_date',
                            'amount',
                            'delivered',
                            ),
                        )); ?>
