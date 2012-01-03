<?php 


echo CHTML::link("Auto-Populate Cash for " . $model->summary, 
                 array("populateCash",
                       'id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'cash-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->cash),
                  'selectionChanged'=>
                  ZHtml::clickableRow('CheckIncome/view', 'join'),

                  'columns'=>array(
                      'check_num:ntext:Cash?',
                      'amount:currency:Cash Amount',
                      'payer:ntext:Payer',
                      'check_date:date:Cash Date',
                      'unassigned:currency:Un-Assigned',
                      ),
                  )); 

?>

<span class="span-8">

<?php $this->renderPartial("_cash_summary", 
                     array('model' => $model)); ?>

</span>

<span class="span-8 last">

<?php  $this->renderPartial("_coin_summary", 
                     array('model' => $model)); ?>

</span>

<div class="clear"> </div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'subtotal_cash_payments:currency:Cash Total from Payments',
		'subtotal_reconciliation:currency:Cash from Reconciliation',
		'discrepancy:currency:Discrepancy',
	),
)); ?>
