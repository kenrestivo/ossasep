
<div>

<p><em>Requirement Summary:</em></p>

<?php
    $this->renderPartial("_requirement_status", 
                         array('model' => $model));

?>
</div>

<?php 
echo CHTML::link("Receive New Paperwork for ". $model->full_name, 
                 array("RequirementStatus/create",
                       'instructor_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'requirement-status-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->requirement_status
                      ),
                  'columns'=>array(
                      'requirement_type.description:text:Requirement',
                      'received:date:Received On',
                      'expired:date:Expires On',
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'RequirementStatus',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

