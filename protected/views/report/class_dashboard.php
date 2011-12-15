<?php 

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboard-grid',
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
                      'totalcost:nozero:Cost Per Student',
                      ),
                  )); 
?>
