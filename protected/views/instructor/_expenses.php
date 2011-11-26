<?php 
echo CHTML::link("Add Payment for ". $model->full_name, 
                 array("Expense/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'requiermentstatus-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->expenses, 
                      array('keyField' => 'instructor_id,check_id',
                          )),
                  'columns'=>array(
                      array('name' => "Amount",
                            'value' => '$data->check->amount'),
                      'check.check_date',
                      'delivered',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Expense',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

