<?php
$this->breadcrumbs=array(
	'Check Incomes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CheckIncome', 'url'=>array('index')),
	array('label'=>'Create CheckIncome', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('check-income-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Checks (Received) for <?= $this->savedSessionSummary() ?></h1>

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
	'id'=>'check-income-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('CheckIncome/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
	'columns'=>array(
		'check_num',
        'cash:boolean',
		'amount',
		'check_date:date',
		'payer',
		'payee.name:text:Payee',
		'deposit.deposited_date:date:Deposited On',
        'delivered:date',
        'returned:date',
		'session.summary:text:Session',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
