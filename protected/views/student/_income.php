<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes, 
                      array('keyField' => 'student_id,check_id,class_id',
                          )),
                  'columns'=>array(
                      'class.class_name:text:Class',
                      'check.amount:currency:Total Check Amount',
                      'amount:currency:Split Check Amount Assigned',
                      'check.check_date:date:Check Date',
                      'check.payer:text:Payer',
                      'check.delivered:date:Delivered to Company',
                      'check.deposit.deposited_date:date:Deposited',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 

?>
