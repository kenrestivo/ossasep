<?php
$this->breadcrumbs=array(
	'Deposit Details'=>array('index'),
	'Manage',
    );

$this->menu=array(
	array('label'=>'List DepositDetails', 'url'=>array('index')),
	array('label'=>'Create DepositDetails', 'url'=>array('create')),
    );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('deposit-details-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Deposits for <?= CHtml::encode($this->savedSessionSummary()) ?></h1>

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
                        'id'=>'deposit-details-grid',
                        'dataProvider'=>$model->search(),
                        'selectionChanged'=> ZHtml::clickableRow('DepositDetails/view'),
                        'filter'=>$model,
                        'columns'=>array(
                            'id',
                            'deposited_date:date',
                            'total_calculated:currency:Total Deposit',
                            'subtotal_checks:currency:Checks Subtotal',
                            'subtotal_cash_payments:currency:Cash Subtotal',
                            'note',
                            'session.summary:text:Session',
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{print}{view}{delete}',
                                'buttons'=>array
                                (
                                    'print' => array
                                    (
                                        'label'=>'Printable Deposit',
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/printer.png',
                                        'url'=>'Yii::app()->createUrl("DepositDetails/print", array("id"=>$data->id))',
                                        ),
                                    ),
                                ),
                            ),
                        )
    ); 

/// NOTE NO RETURNTO! I want them to go to the view screeen imeediately!
                    echo CHtml::link("Add New Deposit",
                                     array("DepositDetails/create"));



                    ?>
