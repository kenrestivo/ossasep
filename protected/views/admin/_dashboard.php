<?php 

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>$id,
                  'htmlOptions'=>array('style'=>'cursor: pointer;'),
                  'selectionChanged'=>ZHtml::clickableRow('ClassInfo/view'),
                  'summaryText' => '',
                  'dataProvider'=> new KArrayDataProvider(
                      $classes,
                      array('pagination' => false)),
                  'columns'=>array(
                      'summary:ntext:Class',
                      'signup_status:text:Status',
                      'enrolled_count:nozero:Signed up',
                      'waitlist_count:nozero:Waitlisted',
                      'paid:currency:Paid By Students',
                      'owed:currency:Owed From Students',
                      'returned:currency:Returned Payments',
                      'note:text:Admin Note'
                      ),
                  )); 
?>

