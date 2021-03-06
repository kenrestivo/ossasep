<?php
$this->menu=array(
	array('label'=>'Auto-Populate School Days', 
          'url'=>'#', 
          'linkOptions'=>array(
              'submit'=>array(
                  'populate','id' => $model->id),
              'confirm'=>'Automatically add hundreds of days for this school year?')),
	array('label'=>'List SchoolYear', 'url'=>array('index')),
	array('label'=>'Create SchoolYear', 'url'=>array('create')),
	array('label'=>'Delete SchoolYear', 
          'url'=>'#', 
          'linkOptions'=>array(
              'submit'=>array(
                  'delete','id'=>$model->id),
              'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SchoolYear', 'url'=>array('admin')),
    );
?>

<h1>View SchoolYear <?php echo $model->description; ?></h1>





<?php


$this->widget('zii.widgets.jui.CJuiTabs', 
              array(
                  'options'=>array(
                      'cookie'=>array(
                          'expires'=>30)),
                  
                  'tabs'=>array(
                      'School Year' =>
                      $this->renderPartial("_overview", 
                                           array('model' => $model), true),
                      'School Days' =>
                      $this->renderPartial("_days", 
                                           array('model' => $model), true),

                      )));



?>



