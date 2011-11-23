
<?php $this->widget('zii.widgets.CDetailView', array(
                        'data'=>$model,
                        'attributes'=>array(
                            'class_name',
                            'min_grade_allowed',
                            'max_grade_allowed',
                            'start_time',
                            'end_time',
                            'description',
                            'cost_per_class',
                            'max_students',
                            'day_of_week',
                            'location',
                            'status',
                            array('name' => "Session",
                                  'value' =>  $model->session->fmtName()
                            ),
                            'note',
                        ),
                        )
    ); 
?>


<h3>Extra Fees</h3>
<?php 
echo CHTML::link("Add Extra Fee to Class", 
                 array("ExtraFee/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'extrafees-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->extra_fees),
                  'columns'=>array(
                      'description',
                      'amount',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'ExtraFee',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

