<h3>Active classes</h3>
<?php 

$attributes=array(
                      'class_name:ntext',
                      'signup_status:text:Status',
                      'enrolled_count:nozero:Signed up',
                      'waitlist_count:nozero:Waitlisted',
                      'owed:currency:Owed From Students',
                      'paid:currency:Paid By Students',
                      'returned:currency:Returned Payments',
                      'note:text:Admin Note'
    );

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboard-active-grid',
                  'htmlOptions'=>array('style'=>'cursor: pointer;'),
                  'selectionChanged'=>ZHtml::clickableRow('ClassInfo/view'),
                  'dataProvider'=> new KArrayDataProvider(
                      $classes,
                      array('pagination' => false)),
                  'columns'=>$attributes,
                  )); 
?>


<h3>Cancelled classes</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboardcancelled-grid',
                  'htmlOptions'=>array('style'=>'cursor: pointer;'),
                  'selectionChanged'=> ZHtml::clickableRow('ClassInfo/view'),
                  'dataProvider'=> new KArrayDataProvider($cancelled,
                      array('pagination' => false)),
                  'columns'=> $attributes,
                  )); 
?>
