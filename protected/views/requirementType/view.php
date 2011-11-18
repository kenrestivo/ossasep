<?php
$this->breadcrumbs=array(
	'Requirement Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RequirementType', 'url'=>array('index')),
	array('label'=>'Create RequirementType', 'url'=>array('create')),
	array('label'=>'Update RequirementType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RequirementType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RequirementType', 'url'=>array('admin')),
);
?>

<h1>View RequirementType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
	),
)); ?>

<h3>Instructor Types</h3>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructortype-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_types,
                      array('keyField' => 
                            'requirement_type_id,instructor_type_id',
                          )),
                  'columns'=>array(
                      array('name' => "Required For",
                            'value' => '$data->description'),
                      ),
                  )); ?>


