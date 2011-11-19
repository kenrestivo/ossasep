<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	$model->id,
    );

?>
<h1><?php echo $model->class_name; ?></h1>




<?php


$this->widget('zii.widgets.jui.CJuiTabs', 
              array(
                  'options'=>array(
                      'cookie'=>array(
                          'expires'=>30)),

                  'tabs'=>array(
                      'Class' =>
                      $this->renderPartial("_overview", 
                                           array('model' => $model), true),
                      'Students' =>
                      $this->renderPartial("_students", 
                                           array('model' => $model), true),
                      'Instructors'=>
                      $this->renderPartial("_instructors", 
                                           array('model' => $model), true),
                      )));



?>







