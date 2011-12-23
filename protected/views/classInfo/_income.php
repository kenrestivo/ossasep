<?php 
echo CHTML::link("Add Check for " . $model->class_name, 
                 array("Income/create",
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes, 
                      array('keyField' => 'student_id,check_id,class_id',
                          )),
                  'columns'=>array(
                      'student.full_name:text:Student',
                      'check.check_date:date:Check Date',
                      'check.payer:text:Payer',
                      'amount:number:Amount Assigned',
                      'check.amount:number:Total Check Amount',
                      'check.check_num:ntext:Check #',
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