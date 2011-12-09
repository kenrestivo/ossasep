
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'full_name',
		'email',
		'cell_phone',
		'other_phone',
		'note',
		'instructor_type.description',
        'company.name'
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



