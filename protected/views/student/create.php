<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Students', 
                'url'=>array('admin')),
	array('label'=>'Import From Roster', 
          'url'=>array(
              'import')),

);
?>

<h1>Create Student</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<p> and now the import</p>

<?php 

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'rasta-import',
	'enableAjaxValidation'=>false,
)); 

echo 
CHtml::listBox('rasta', null,
        CHtml::listData(Roster::model()->findAll(), 'id', 'full_name'));

$this->endWidget();


?>