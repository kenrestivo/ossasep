
<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid-' . $model->student_id. '-' .$model->class_id,
                  'dataProvider'=>new KArrayDataProvider(
                      $model->income,
                      array('pagination' => false)),
                  'selectionChanged'=>
                  ZHtml::clickableRow('CheckIncome/view', 'join'),
                  'showTableOnEmpty' => false,
                  'summaryText' => '',
                  'columns'=>array(
                      'check.check_num:text:Check #',
                      'check.check_date:date:Check Date',
                      'check.amount:currency:Total Check Amount',
                      'amount:currency:Split Check Amount Assigned',
                      ),
                  )); 

?>
remainder due


