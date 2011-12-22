<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'first_name',
		'last_name',
		'grade:grade',
        'contact',
		'emergency_1',
		'emergency_2',
		'emergency_3',
		'parent_email:email',
        'public_email_ok:boolean',
        'note:ntext'
	),

)); 

echo CHTML::link("Edit  ". $model->full_name, 
                 array('update', 'id'=>$model->id,
                       'returnTo' => Yii::app()->request->requestUri));

?> &nbsp;<?php
echo CHTML::link("Delete  ". $model->full_name, 
                 array('#', 
                       'linkOptions'=>array(
                           'submit'=>array(
                               'delete',
                               'id'=>$model->id),
                           'confirm'=>'Are you sure you want to delete this item?')));




?>

