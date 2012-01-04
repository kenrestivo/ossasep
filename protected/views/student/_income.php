<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes),
                  'selectionChanged'=>
                  ZHtml::clickableRow('CheckIncome/view', 'join'),
                  'columns'=>array(
                      'class.summary:text:Class',
                      'amount:currency:Split Check Amount Assigned',
                      'check.check_num:text:Check #',
                      'check.payer:text:Payer',
                      'check.amount:currency:Total Check Amount',
                      'check.check_date:date:Check Date',
                      'check.delivered:date:Delivered to Company',
                      'check.deposit.deposited_date:date:Deposited',
                      'check.returned:date:Returned to Payer',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 

?>
