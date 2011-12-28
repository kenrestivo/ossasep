
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'class-info-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->classes),
                  'columns'=>array(
                      'class_name:ntext:Name',
                      'min_grade_allowed:grade:Min Grade',
                      'max_grade_allowed:grade:Max Grade',
                      'start_time:time:Start',
                      'end_time:time:End',
                      'cost_per_class:Cost Per Class',
                      'min_students:number:Min Students',
                      'max_students:number:Max Students',
                      array('name' => 'Weekday',  // TODO use kformatter
                            'value' => 'ZHtml::weekdayTranslation($data->day_of_week)'),
                      'location:ntext:Location',
                      'status:ntext:Status',
                      'session.summary:text:Session',
                      array(
                          'class'=>'CButtonColumn',
                          'template'=>'{view}{delete}',
                          ),
                      )))
;

              ?>

