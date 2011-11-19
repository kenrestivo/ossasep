<?php $this->menu=array(
	array('label'=>'List ClassInfo', 'url'=>array('index')),
	array('label'=>'Create ClassInfo', 'url'=>array('create')),
	array('label'=>'Update ClassInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClassInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClassInfo', 'url'=>array('admin')),
    );



?>

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


