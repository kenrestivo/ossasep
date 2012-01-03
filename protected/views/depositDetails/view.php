<?php
$this->breadcrumbs=array(
	'Deposit Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Create DepositDetails', 'url'=>array('create')),
	array('label'=>'Update DepositDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DepositDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DepositDetails', 'url'=>array('admin')),
);
?>

<h1>View Deposit <?php echo $model->summary; ?> </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'deposited_date:date',
		'total_amount:currency',
		'pennies',
		'nickels',
		'dimes',
		'quarters',
		'dollar_coins',
		'ones',
		'fives',
		'tens',
		'twenties',
		'fifties',
		'hundreds',
        'note',
        'session.summary:text:Session',
	),
)); ?>


<?php
      echo CHTML::link(CHtml::encode("Edit  ". $model->summary), 
                 array('update', 'id'=>$model->id,
                       'returnTo' => Yii::app()->request->requestUri));

?> &nbsp;<?php
echo CHTML::link(CHtml::encode("Delete  ". $model->summary), 
                 array('#', 
                       'linkOptions'=>array(
                           'submit'=>array(
                               'delete',
                               'id'=>$model->id),
                           'confirm'=>'Are you sure you want to delete this item?')));

