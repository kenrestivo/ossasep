<?php
$this->breadcrumbs=array(
	'Signups'=>array('index'),
	'Edit',
    );


?>

<h1>Update Signup <?php echo CHtml::encode($model->student->full_name). " " . CHtml::encode($model->class->summary)  ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>