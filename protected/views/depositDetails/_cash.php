<?php 

  //XXX this is not right at all!
echo CHTML::link("Add Cash to deposit " . $model->summary, 
                 array("CheckIncome/create",
                       'company_id' => $model->id,
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
                      'returned:date:Returned Date',
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