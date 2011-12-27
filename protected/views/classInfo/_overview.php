
<?php echo $this->renderPartial('_description', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        'status',
		'company.name:ntext:Company',
        'session.summary:text:Session',
        'note',
	),
)); ?>

<p class="clear"></p>
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


