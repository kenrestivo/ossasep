<?php 
echo CHTML::link("Add Payment for ". $model->full_name, 
                 array("CheckExpense/create",
                       'payee_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'requiermentstatus-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->expenses
                      ),
                  'columns'=>array(
                      'check.check_num:ntext:Check #',
                      'check.amount:currency:Total Check Amount',
                      'check.check_date:date:Check Date',
                      'check.payer:text:Payer',
                      'check.delivered:date:Delivered to Company',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'CheckExpense',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

