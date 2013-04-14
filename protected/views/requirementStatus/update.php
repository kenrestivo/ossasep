<?php
$this->breadcrumbs=array(
	'RequirementStatuss'=>array('index'),
	'Edit',
    );


?>

<h1>Update RequirementStatus <?php echo $model->instructor->full_name. " " . $model->requirement_type->description  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>