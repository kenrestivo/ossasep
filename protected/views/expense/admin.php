<?php
$this->breadcrumbs=array(
	'Expenses'=>array('index'),
	'Manage',
    );

$this->menu=array(
	array('label'=>'List Expense', 'url'=>array('index')),
	array('label'=>'Create Expense', 'url'=>array('create')),
    );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('expense-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Expenses</h1>

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
                        'id'=>'expense-grid',
                        'dataProvider'=>$model->search(),
                        'filter'=>$model,
                        'columns'=>array(
                            'instructor.full_name',
                            'check.amount',
                            'check.payer',
                            'check.payee.full_name',
                            'check.check_num',
                            'check.check_date',
                            'amount',
                            'delivered',
                            array(
                                'class'=>'CompositeButtonColumn',
                                'viewButtonUrl'=>Yii::app()->controller->createUrl("view",$model->primaryKey),
                                'updateButtonUrl'=>Yii::app()->controller->createUrl("update",$model->primaryKey),
                                'deleteButtonUrl'=>Yii::app()->controller->createUrl("delete",$model->primaryKey),
                                ),
                            ),
                        )); ?>
