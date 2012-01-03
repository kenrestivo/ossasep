<?php 

  //XXX this is not right at all!
echo CHTML::link("Add Cash to deposit " . $model->summary, 
                 array("CheckIncome/create",
                       'company_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'check-income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->checks),
                  'selectionChanged'=>
                  ZHtml::clickableRow('CheckIncome/view', 'join'),

                  'columns'=>array(
                      'check_num:ntext:Check #',
                      'amount:currency:Check Amount',
                      'payer:ntext:Payer',
                      'check_date:date:Check Date',
                      'payee.name:text:Payee',
                      'unassigned:currency:Un-Assigned',
                      'returned:date:Returned Date',
                      ),
                  )); 
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pennies',
		'nickels',
		'dimes',
		'quarters',
		'dollar_coins',
		'ones',
		'fives',
		'tens',
		'twenties',
		'fifties',
		'hundreds',
	),
)); ?>
