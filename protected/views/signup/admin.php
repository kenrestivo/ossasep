<?php
$this->breadcrumbs=array(
	'Signups'=>array('index'),
	'Manage',
    );

$this->menu=array(
	array('label'=>'List Signup', 'url'=>array('index')),
	array('label'=>'Create Signup', 'url'=>array('create')),
    );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('student-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Signups</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
                                                or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
                                   'model'=>$model,
                                   )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'student-grid',
                        'dataProvider'=>$model->search(),
                        'filter'=>$model,
                        'columns'=>array(
                            'student.full_name',
                            'class.class_name',
                            'signup',
                            'status',
                            array(
                                'class'=>'ButtonColumn',
                                'viewButtonUrl'=>Yii::app()->controller->createUrl("view",$model->primaryKey),
                                'updateButtonUrl'=>Yii::app()->controller->createUrl("update",$model->primaryKey),
                                'deleteButtonUrl'=>Yii::app()->controller->createUrl("delete",$model->primaryKey),
                                ),
                            ),
                        )); ?>
