<?php
$this->breadcrumbs=array(
	'Class Meetings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClassMeeting', 'url'=>array('index')),
	array('label'=>'Manage ClassMeeting', 'url'=>array('admin')),
);
?>

<h1>Create ClassMeeting 
<?php
if(isset($model->class_id)){
    echo " for " . CHtml::encode($model->class->summary);
}
?>
</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>