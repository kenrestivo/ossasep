
<h3>Extra Fees</h3>
<?php 
echo CHTML::link("Add Extra Fee to Class", 
                 array("ExtraFee/create",
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'extrafees-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->extra_fees),
                  'columns'=>array(
                      'description',
                      'amount',
					  'pay_to_instructor:boolean',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'ExtraFee',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>


