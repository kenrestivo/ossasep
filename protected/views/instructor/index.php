<h1>Instructors</h1>
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
	'columns'=>array(
		'full_name',
        'alias',
		'instructor_type.description:text:Type',
        'company.name:text:Company',
		'email',
		'cell_phone',
		'other_phone',
		'note',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 


echo CHTML::link("Add New Instructor",
                 array("Instructor/create",
                       'returnTo' => Yii::app()->request->requestUri));


?>
