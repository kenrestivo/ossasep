
<?php echo $this->renderPartial('_description', array('model'=>$model)); ?>

<?php
echo CHTML::link("Edit  ". $model->class_name, 
                 array('update', 'id'=>$model->id,
                       'returnTo' => Yii::app()->request->requestUri));

?> &nbsp;<?php
echo CHTML::link("Delete  ". $model->class_name, 
                 array('#', 
                       'linkOptions'=>array(
                           'submit'=>array(
                               'delete',
                               'id'=>$model->id),
                           'confirm'=>'Are you sure you want to delete this item?')));



?>

<p></p>

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


