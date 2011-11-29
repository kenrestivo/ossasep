<?php 
echo CHTML::link("Add Check for " . $model->full_name, 
                 array("Income/create",
                       'student_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes, 
                      array('keyField' => 'student_id,check_id,class_id',
                          )),
                  'columns'=>array(
                      array('name' => "Class",
                            'value' => '$data->class->description'),
                      'check.amount',
                      'amount',
                      'check.check_date',
                      'check.payer',
                      'delivered',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>
