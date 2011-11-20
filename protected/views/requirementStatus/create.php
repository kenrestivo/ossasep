<?php


$this->menu=array(
	array('label'=>'List RequirementStatus', 'url'=>array('index')),
	array('label'=>'Manage RequirementStatus', 'url'=>array('admin')),
);
?>

<h1>Create RequirementStatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>