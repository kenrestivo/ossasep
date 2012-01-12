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

<p>
<? echo CHtml::link("Printable Deposit Sheet",
                    array("DepositDetails/print",
                          'id' => $model->id));
?>
</p>

<?php

$this->widget('zii.widgets.jui.CJuiTabs', 
              array(
                  'options'=>array(
                      'cookie'=>array(
                          'expires'=>30)),
                  
                  'tabs'=>array(
                      'Overview' =>
                      $this->renderPartial("_overview", 
                                           array('model' => $model), true),
                      'Checks' =>
                      $this->renderPartial("_payments", 
                                           array('model' => $model), true),
                      'Cash' =>
                      $this->renderPartial("_cash", 
                                           array('model' => $model), true),
                      )));



?>


