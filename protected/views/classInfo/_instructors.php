<div>
<span class="span-11">

<?php 
echo CHTML::link("Add Instructor to " . $model->class_name, 
                 array("InstructorAssignment/create",
                       'class_id' => $model->id,
                       'company_id' => $model->company_id,
                       'returnTo' => Yii::app()->request->requestUri));
?>
</span>
<span class="span-9 last">


 <b><?php echo CHtml::encode($model->getAttributeLabel('company')); ?>:</b>
  <?php echo CHtml::encode($model->company->name); 
echo CHTML::link("(Change)",
                 array('update', 'id'=>$model->id,
                       'returnTo' => Yii::app()->request->requestUri));
?>


</span>
</div>
<div class="clear"></div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructorassignment-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_assignments, 
                      array('keyField' => 'class_id,instructor_id',
                          )),
                  'columns'=>array(
                      'instructor.full_name:text:Instructor',
                      'percentage:number:Percentage',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'InstructorAssignment',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

