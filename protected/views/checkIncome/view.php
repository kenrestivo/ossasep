<?php
$this->breadcrumbs=array(
	'Check Incomes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CheckIncome', 'url'=>array('index')),
	array('label'=>'Create CheckIncome', 'url'=>array('create')),
	array('label'=>'Update CheckIncome', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CheckIncome', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CheckIncome', 'url'=>array('admin')),
);
?>

<h1>View Check <?php echo $model->short_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'amount',
		'payer',
		'payee',
		'check_num',
		'check_date',
		'deposit.deposited_date',
	),
)); ?>

<p></p>
<h2>Assignments</h2>
<?php 
  // could be a tab, but probably not necessary at the moment
echo CHTML::link("Add Split for " . $model->amount, 
                 array("Income/create",
                       'check_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes, 
                      array('keyField' => 'check_id,student_id,class_id',
                          )),
                  'columns'=>array(
                      'student.full_name',
                      'class.class_name',
                      'amount',
                      'delivered',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>
