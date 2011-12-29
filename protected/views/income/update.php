<?php
$this->breadcrumbs=array(
	'Income Splits'=>array('index'),
	'Edit',
    );


$this->menu=array(
	array('label'=>'List Income Assignment', 'url'=>array('index')),
	array('label'=>'Create Income Assignment', 'url'=>array('create')),
	array('label'=>'View Income Assignment', 
          'url'=>array('view', 
                       'student_id'=>$model->student_id, 
                       'check_id' => $model->check_id, 
                       'class_id' => $model->class_id)),
	array('label'=>'Manage Income Assignment', 'url'=>array('admin')),
    );
?>

<h1>Update Income Assignment <?php echo $model->student->full_name. " " . $model->check->check_date  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>