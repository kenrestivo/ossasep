<?php 
echo CHTML::link("Add Payment for ". $model->full_name, 
                 array("Expense/create",
                       'instructor_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'requiermentstatus-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->expenses
                      ),
                  'columns'=>array(
                      'check.amount:number:Check Total Amount',
                      'check.check_date:date:Check Date',
                      'check.delivered:date:Delivered To Instructor',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Expense',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

