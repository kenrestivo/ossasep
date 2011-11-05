<?php
$this->breadcrumbs=array(
	'Rosters'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Roster', 'url'=>array('index')),
	array('label'=>'Create Roster', 'url'=>array('create')),
	array('label'=>'View Roster', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Roster', 'url'=>array('admin')),
);
?>

<h1>Update Roster <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>