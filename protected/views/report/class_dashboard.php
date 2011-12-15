<?php 

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboard-grid',
                  'dataProvider'=> $classes,
                  'columns'=>array(
                      'class_name:text:Class',
                      'signup_status:text:Status',
                      'signups:nozero:Signed up',
                      'waitlist:nozero:Waitlisted',
                      'meetings:nozero:Meetings',
                      'totalcost:number:Cost Per Student',
                      ),
                  )); 
?>
