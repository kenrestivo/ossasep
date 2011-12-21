<?php $this->menu=array(
	array('label'=>'List Student', 'url'=>array('index')),
	array('label'=>'Create Student', 'url'=>array('create')),
	array('label'=>'Update Student', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Student', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Student', 'url'=>array('admin')),
);

?>


<h1>View Student <?php echo $model->full_name; ?> </h1>



<?php


$this->widget('zii.widgets.jui.CJuiTabs', 
              array(
                  'options'=>array(
                      'cookie'=>array(
                          'expires'=>30)),
                  
                  'tabs'=>array(
                      'Student' =>
                      $this->renderPartial("_overview", 
                                           array('model' => $model), true),
                      'Classes' =>
                      $this->renderPartial("_classes", 
                                           array('model' => $model), true),
                      'Unpaid' =>
                      $this->renderPartial("_owed", 
                                           array('model' => $model), true),
                      'Paid' =>
                      $this->renderPartial("_income", 
                                           array('model' => $model), true),
                      )));



?>







