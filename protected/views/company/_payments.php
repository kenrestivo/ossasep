<?php 

  //XXX this is not right at all!
echo CHTML::link("Add Check for " . $model->name, 
                 array("CheckIncome/create",
                       'company_id' => $model->id
                     ));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes),
                  'selectionChanged'=>
                  ZHtml::clickableRow('CheckIncome/view', 'join'),

                  'columns'=>array(
                      'check.check_num:ntext:Check #',
                      'check.amount:currency:Total Check Amount',
                      'student.full_name:text:Student', 
                      'class.summary:ntext:Class',
                      'amount:currency:Amount Assigned',
                      'check.check_date:date:Check Date',
                      'check.payer:text:Payer',
                      'check.delivered:date:Delivered to Company',
                      ),
                  )); 
?>