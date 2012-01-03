<?php
$this->breadcrumbs=array(
	'Check Incomes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Edit', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Check <?php echo $model->summary; ?></h1>

<?php 

 echo $this->renderPartial('_view', array('data'=>$model));


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'delivered:date',
		'returned:date',
		'deposit.deposited_date:date:Deposited',
        'session.summary:text:Session',
        'unassigned:currency:Un-Assigned',
	),
)); 


?>

<p></p>
<h2>Assignments</h2>
<?php 

$un= $model->unassigned;
if($un > 0){
    echo "<div>Check completely assigned, no amounts to assign.</div>";
}
  // could be a tab, but probably not necessary at the moment
    echo CHTML::link("Add Split for " . CHtml::encode(Yii::app()->format->currency($un) . ' (of '. Yii::app()->format->currency($model->amount) .')'),
                 array("Income/create",
                       'check_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  /* NOTE! this can't be ajax because the view above
                     won't update and will be out of sync.
                     I guess I could trigger that one to update, but that'd
                     be stupid, just update the whole page instead.
                   */
                  'ajaxUpdate' => false,
                  'summaryText' => $this->splitSummary(),
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes
                      ),
                  'columns'=>array(
                      'student.full_name:text:Student',
                      'class.summary:text:Class',
                      'amount:currency:Assigned Split',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>
