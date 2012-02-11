<?php
$this->breadcrumbs=array(
	'Check Expenses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Check Payables', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('check-expense-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Checks (Payables) for <?= $this->savedSessionSummary() ?></h1>

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
	'id'=>'check-expense-grid',
	'dataProvider'=>$model->search(),
    'selectionChanged'=>ZHtml::clickableRow('CheckExpense/update'),
	'filter'=>$model,
	'columns'=>array(
		'check_num:ntext',
		'amount:currency',
		'check_date:date',
		'payee.full_name:text:Payee',
        'delivered:date',
		'payer:ntext',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
		),
        ))); ?>
