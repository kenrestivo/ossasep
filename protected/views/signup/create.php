<?php
$this->breadcrumbs=array(
	'Signups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Signup', 'url'=>array('index')),
	array('label'=>'Manage Signup', 'url'=>array('admin')),
);
?>

<h1>Create Signup
<?php
if(isset($_GET['class_id'])){
    echo " for " . CHtml::encode($model->class->summary);
}
if(isset($_GET['student_id'])){
    echo " for " . CHtml::encode($model->student->full_name);
}
?>
</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>