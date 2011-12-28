<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	$model->id,
    );

?>
<h1><?php echo CHtml::encode($model->summary); ?></h1>




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
                      'Extra Fees' =>
                      $this->renderPartial("_extrafees", 
                                           array('model' => $model), true),
                      'Instructors'=>
                      $this->renderPartial("_instructors", 
                                           array('model' => $model), true),
                      'Meetings'=>
                      $this->renderPartial("_meetings", 
                                           array('model' => $model), true),
                      'Students' =>
                      $this->renderPartial("_students", 
                                           array('model' => $model), true),
                      'Income'=>
                      $this->renderPartial("_income", 
                                           array('model' => $model), true),
                      )));



?>







