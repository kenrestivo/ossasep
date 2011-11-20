<?php
$this->breadcrumbs=array(
	'RequirementStatuss'=>array('index'));

$this->menu=array(
	array('label'=>'List RequirementStatus', 'url'=>array('index')),
	array('label'=>'Create RequirementStatus', 'url'=>array('create')),
	array('label'=>'Update RequirementStatus', 'url'=>array('update', 
                                                 'instructor_id'=>$model->instructor_id,
              'requirement_type_id' => $model->requirement_type_id)),
	array('label'=>'Delete RequirementStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete', 'instructor_id'=>$model->instructor_id,
              'requirement_type_id' => $model->requirement_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RequirementStatus', 'url'=>array('admin')),
);
?>

<h1>View RequirementStatus </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'instructor.full_name',
        'requirement_type.description',
        'received',
        'expired'
	),
)); ?>
