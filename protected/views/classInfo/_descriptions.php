
<h3>Descriptions</h3>
<?php 
echo CHTML::link("Add Description to Class", 
                 array("ClassDescription/create",
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'extrafees-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->class_descriptions),
                  'columns'=>array(
					  'language.description:text:Language',
                      'description:ntext:Description',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'ClassDescription',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>


