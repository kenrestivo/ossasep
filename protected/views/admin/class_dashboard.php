<h3>Active classes</h3>
<?php 


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboard-active-grid',
                  'htmlOptions'=>array('style'=>'cursor: pointer;'),
                  'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('ClassInfo/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
                  'dataProvider'=> new KArrayDataProvider(
                      $classes,
                      array('pagination' => false)),
                  'columns'=>array(
                      'class_name:ntext',
                      'signup_status:text:Status',
                      'enrolled_count:nozero:Signed up',
                      'waitlist_count:nozero:Waitlisted',
                      'paid:currency:Paid',
                      'owed:currency:Owed',
                      'returned:currency:Refunded',
                      'note:text:Admin Note'
                      ),
                  )); 
?>


<h3>Cancelled classes</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboardcancelled-grid',
                  'htmlOptions'=>array('style'=>'cursor: pointer;'),
                  'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('ClassInfo/view', array('id'=>'')) . "' + $.fn.yiiGridView.getSelection(id);}",
                  'dataProvider'=> new KArrayDataProvider($cancelled,
                      array('pagination' => false)),
                  'columns'=>array(
                      'class_name:ntext',
                      'signup_status:text:Status',
                      'enrolled_count:nozero:Signed up',
                      'waitlist_count:nozero:Waitlisted',
                      'paid:currency:Paid',
                      'owed:currency:Owed',
                      'returned:currency:Refunded',
                      'note:text:Admin Note'
                      ),
                  )); 
?>
