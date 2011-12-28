<?php 

  //XXX this is not right at all!
echo CHTML::link("Add Check for " . $model->name, 
                 array("CheckIncome/create",
                       'company_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes, 
                      array('keyField' => 'student_id,check_id,class_id',
                          )),
                  'columns'=>array(
                      'student.full_name:text:Student', 
                      'class.summary:ntext:Class',
                      'amount:currency:Amount Assigned',
                      'check.check_num:ntext:Check #',
                      'check.payer:text:Payer',
                      'check.amount:currency:Total Check Amount',
                      'check.check_date:date:Check Date',
                      'check.delivered:date:Delivered to Company',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>