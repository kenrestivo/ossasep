<?php
$this->breadcrumbs=array(
	'Incomes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Income', 'url'=>array('index')),
	array('label'=>'Manage Income', 'url'=>array('admin')),
);
?>

<h1>Assign Check Split</h1>

<?php echo $this->renderPartial('_form', 
                                array('model'=>$model,
                                    'remaining' => $remaining)); ?>