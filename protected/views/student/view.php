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
                      )));



?>







