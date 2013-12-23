<?php
$this->breadcrumbs=array(
	'Class Descriptions'=>array('index'),
	'Create',
);

?>

<h1>Create ClassDescription
<?php
if(isset($model->class_id)){
    echo " for " . CHtml::encode($model->class->summary);
}
?>
</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>