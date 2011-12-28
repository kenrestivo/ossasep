<h3>Active classes</h3>
<?php 


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboard-active-grid',
                  'dataProvider'=> new KArrayDataProvider($classes),
                  'columns'=>array(
                      array(
                          'class'=>'CLinkColumn',
                          'labelExpression'=>'$data["class_name"]',
                          'urlExpression'=>
                          'Yii::app()->createUrl("/ClassInfo/view",array("id"=>$data["id"]))',
                          'header'=>'Class'
                          ),
                      // 'signup_status:text:Status',
                      'enrolled_count:nozero:Signed up',
                      'waitlist_count:nozero:Waitlisted',
                      'paid:currency:Paid',
                      'returned:currency:Refunded',
                      'note:text:Admin Note'
                      ),
                  )); 
?>


<h3>Cancelled classes</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboardcancelled-grid',
                  'dataProvider'=> new KArrayDataProvider($cancelled),
                  'columns'=>array(
                      array(
                          'class'=>'CLinkColumn',
                          'labelExpression'=>'$data["class_name"]',
                          'urlExpression'=>
                          'Yii::app()->createUrl("/ClassInfo/view",array("id"=>$data["id"]))',
                          'header'=>'Class'
                          ),
                      'enrolled_count:nozero:Signed up',
                      'waitlist_count:nozero:Waitlisted',
                      'paid:currency:Paid',
                      'returned:currency:Refunded',
                      'note:text:Admin Note'
                      ),
                  )); 
?>
