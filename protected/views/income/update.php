<?php
$this->breadcrumbs=array(
	'Income Splits'=>array('index'),
	'Edit',
    );


?>

<h1>Update Income Assignment <?php echo $model->student->full_name. " " . $model->check->check_date  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>