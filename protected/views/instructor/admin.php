<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('instructor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Instructors</h1>

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
	'id'=>'instructor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>ZHtml::clickableRow('Instructor/view'),
	'columns'=>array(
		'first_name',
		'last_name',
        'alias',
		'instructor_type.description:text:Type',
        'company.name:text:Company',
		'email:email',
		'cell_phone',
		'other_phone',
		'note',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{delete}',
		),
	),
)); 


echo CHTML::link("Add New Instructor",
                 array("Instructor/create",
                       'returnTo' => Yii::app()->request->requestUri));


?>
