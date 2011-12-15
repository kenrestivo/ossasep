<?php 

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'classdashsboard-grid',
                  'dataProvider'=> new KArrayDataProvider($classes),
                  'columns'=>array(
                      'class_name',
                      'signup_status',
                      'signups',
                      'waitlist',
                      'meetings',
                      ),
                  )); 
?>
