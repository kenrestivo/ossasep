<?php
$this->breadcrumbs=array(
	'Instructors'=>array('index'),
	$model->id,
    );
?>

<h1><?= $model->full_name ?></h1>






<?php


$this->widget('zii.widgets.jui.CJuiTabs', 
              array(
                  'options'=>array(
                      'cookie'=>array(
                          'expires'=>30)),
                  
                  'tabs'=>array(
                      'Instructor' =>
                      $this->renderPartial("_overview", 
                                           array('model' => $model), true),
                      'Classes' =>
                      $this->renderPartial("_classes", 
                                           array('model' => $model), true),
                      'Requirements'=>
                      $this->renderPartial("_requirements", 
                                           array('model' => $model), true),
                      'Payment'=>
                      $this->renderPartial("_expenses", 
                                           array('model' => $model), true),
                      )));



?>


