<?php
$this->breadcrumbs=array(
	'RequirementStatuss'=>array('index'),
	'Edit',
    );


$this->menu=array(
	array('label'=>'List RequirementStatus', 'url'=>array('index')),
	array('label'=>'Create RequirementStatus', 'url'=>array('create')),
	array('label'=>'View RequirementStatus', 'url'=>array('view', 'instructor_id'=>$model->instructor_id, 'requirement_type_id' => $model->requirement_type_id)),
	array('label'=>'Manage RequirementStatus', 'url'=>array('admin')),
);
?>

<h1>Update RequirementStatus <?php echo $model->instructor->full_name. " " . $model->requirement_type->description  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>