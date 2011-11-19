<?php
$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Instructor', 'url'=>array('index')),
	array('label'=>'Create Instructor', 'url'=>array('create')),
	array('label'=>'Update Instructor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Instructor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Instructor', 'url'=>array('admin')),
);
?>

<h1>View Instructor <?php echo $model->full_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'full_name',
		'email',
		'cell_phone',
		'other_phone',
		'note',
		'instructor_type.description',
	),
)); ?>


<h3>Classes</h3>
<?php 
echo CHTML::link("Add Class for Instructor", 
                 array("InstructorAssignment/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructorassignment-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_assignments, 
                      array('keyField' => 'class_id,instructor_id',
                          )),
                  'columns'=>array(
                      array('name' => "Name",
                            'value' => '$data->instructor->full_name'),
                      'percentage',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'InstructorAssignment',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>


