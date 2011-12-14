
<div>

<p><em>Required:</em>
<?php foreach($model->instructor_type->requirements as $r){ 
      echo $r->description . ", ";
}
?>
</p>
</div>


<?php 
echo CHTML::link("Receive New Paperwork for ". $model->full_name, 
                 array("RequirementStatus/create",
                       'instructor_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'requiermentstatus-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->requirement_status, 
                      array('keyField' => 'requirement_type_id,instructor_id',
                          )),
                  'columns'=>array(
                      'requirement_type.description:text:Requirement',
                      'received:date:Received On',
                      'expired:date:Expires On',
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'RequirementStatus',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

