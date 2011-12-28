
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'class-info-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->classes),
                  'columns'=>array(
                      'class_name',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'ClassInfo',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

