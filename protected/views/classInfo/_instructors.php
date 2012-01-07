<div>
<span class="span-11">

<?php 

     echo CHTML::link(CHtml::encode("Add Instructor to " . $model->summary), 
                 array("InstructorAssignment/create",
                       'class_id' => $model->id,
                       'company_id' => $model->company_id,
                       'returnTo' => Yii::app()->request->requestUri));

$un=$model->instructor_discrepancy;
if($un  == 0){
    echo "<br /><span>Instructors completely assigned, no instructor percentage remaining.</span>";
}
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
                 /* NOTE! this can't be ajax because the view above
                     won't update and will be out of sync.
                     I guess I could trigger that one to update, but that'd
                     be stupid, just update the whole page instead.
                   */
                  'ajaxUpdate' => false,
                  'summaryText' => $this->instructorSplitSummary(),
                   'dataProvider'=>new KArrayDataProvider(
                       $model->instructor_assignments),
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

