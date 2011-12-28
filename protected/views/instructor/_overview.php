
<?php 
$attributes =array(
		'full_name',
        'alias',
		'email:email',
		'cell_phone',
		'other_phone',
		'note:ntext',
		'instructor_type.description:ntext:Instructor Type',
	);
if($model->is_company){
    $attributes[]='company.name:ntext:Company';
}

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>$attributes,
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



