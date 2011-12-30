<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
        'use_publicly:boolean',
	),
)); ?>

<p class="clear"></p>
<?php
      echo CHTML::link(CHtml::encode("Edit  ". $model->name), 
                 array('update', 'id'=>$model->id,
                       'returnTo' => Yii::app()->request->requestUri));

?> &nbsp;<?php
echo CHTML::link(CHtml::encode("Delete  ". $model->name), 
                 array('#', 
                       'linkOptions'=>array(
                           'submit'=>array(
                               'delete',
                               'id'=>$model->id),
                           'confirm'=>'Are you sure you want to delete this item?')));


