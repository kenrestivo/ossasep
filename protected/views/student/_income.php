<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes
                      ),
                  'columns'=>array(
                      'class.class_name:text:Class',
                      'amount:currency:Split Check Amount Assigned',
                      'check.check_num:text:Check #',
                      'check.payer:text:Payer',
                      'check.amount:currency:Total Check Amount',
                      'check.check_date:date:Check Date',
                      'check.delivered:date:Delivered to Company',
                      'check.deposit.deposited_date:date:Deposited',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 

?>
