<h3>Active classes</h3>
<?php 

  // TODO: put this in a tools menu! above or on the right side
echo CHtml::link("Auto-populate all meeting dates",
				 array("Tools/autoPopulate"));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboard-active-grid',
                  'dataProvider'=> $classes,
                  'columns'=>array(
                      array(
                          'class'=>'CLinkColumn',
                          'labelExpression'=>'$data["class_name"]',
                          'urlExpression'=>
                          'Yii::app()->createUrl("/ClassInfo/view",array("id"=>$data["id"]))',
                          'header'=>'Class'
                          ),
                      'signup_status:text:Status',
                      'signups:nozero:Signed up',
                      'waitlist:nozero:Waitlisted',
                      'meetings:nozero:Meetings',
                      'totalcost:currency:Cost Per Student',
                      'note:text:Admin Note'
                      ),
                  )); 
?>


<h3>Cancelled classes</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboardcancelled-grid',
                  'dataProvider'=> $cancelled,
                  'columns'=>array(
                      array(
                          'class'=>'CLinkColumn',
                          'labelExpression'=>'$data["class_name"]',
                          'urlExpression'=>
                          'Yii::app()->createUrl("/ClassInfo/view",array("id"=>$data["id"]))',
                          'header'=>'Class'
                          ),
                      'signups:nozero:Signed up',
                      'waitlist:nozero:Waitlisted',
                      'meetings:nozero:Meetings',
                      'totalcost:currency:Cost Per Student',
                      'note:text:Admin Note'
                      ),
                  )); 
?>
