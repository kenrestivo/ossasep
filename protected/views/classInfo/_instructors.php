<div>
<span class="span-11">

<?php 

$un=$model->instructor_discrepancy;
if($un  > 0){
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

} else {
    echo "<div>Instructors completely assigned, no instructor percentage remaining. Change or delete existing instructor percentages first.</div>";
}

?>


</span>
</div>
<div class="clear"></div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructorassignment-grid',
                 /* NOTE! this can't be ajax because the view above
                     won't update and will be out of sync.
                     I guess I could trigger that one to update, but that'd
                     be stupid, just update the whole page instead.
                   */
                  'ajaxUpdate' => false,
                   'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_assignments, 
                      array('keyField' => 'class_id,instructor_id',
                          )),
                  'columns'=>array(
                      'instructor.full_name:text:Instructor',
                      'percentage:percent:Percentage',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'InstructorAssignment',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

