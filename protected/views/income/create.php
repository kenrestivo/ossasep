<?php
$this->breadcrumbs=array(
	'Incomes'=>array('index'),
	'Create',
);

?>

<h1>Assign Check Split</h1>

<?php echo $this->renderPartial('_form', 
                                array('model'=>$model,
                                    'remaining' => $remaining)); ?>