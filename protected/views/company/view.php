<?php
$this->breadcrumbs=array(
	'Company'=>array('index'),
	$model->id,
    );


$this->menu=array(
	array('label'=>'Update Company', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Company', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);

?>

<h1><?= $model->name ?></h1>


<?php

$tabs=array(
    'Company' =>
    $this->renderPartial("_overview", 
                         array('model' => $model), true),
    'Instructors' =>
    $this->renderPartial("_instructors", 
                         array('model' => $model), true),

    );


$this->widget('zii.widgets.jui.CJuiTabs', 
              array(
                  'options'=>array(
                      'cookie'=>array(
                          'expires'=>30)),
                  'tabs'=>$tabs,
                      ));



?>


