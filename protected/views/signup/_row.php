<tr>
<td>
    <?php 
      // I cannot use the multiendeddropdown here, because of the odd dropdown
    if(isset($model->class_id) && !$model->hasErrors()){
        echo CHtml::encode($model->class->summary);
        echo $form->hiddenField($model,"[$index]class_id"); 
    } else {
        echo $form->dropDownList(
            $model,"[$index]class_id",
            array(
                'In Grade Range' =>
                CHtml::listData(
                    ClassInfo::model()->findAll(
                        $model->student->grade . '>= min_grade_allowed and '.
                        $model->student->grade . '<= max_grade_allowed'), 
                    'id', 'summary'),
                'Outside Grade Range' =>
                CHtml::listData(
                    ClassInfo::model()->findAll(
                        $model->student->grade . '< min_grade_allowed or '.
                        $model->student->grade . '> max_grade_allowed'), 
                    'id', 'summary'),
                ), 
            array('class' => 'chzn-select',
                              'ajax' => array(
                  'type'=>'POST', 
                  'dataType' => 'json',
                  'url'=>CController::createUrl('ClassInfo/json'),
                  'success' => 
                  "function(data){
$('#Signup_${index}_additional_info').text('Student ' + data['enrolled_count'] + ' of ' + data['max_students']);
if(parseInt(data['enrolled_count']) >= parseInt(data['max_students'])){
    $('#Signup_${index}_status').val('Waitlist');
} else{
    $('#Signup_${index}_status').val('Enrolled');
}
;}",
                                  ))); 
    }

echo $form->error($model,"[$index]class_id"); 

?> 


</td>
<td>
<?php echo $form->textField($model,"[$index]signup_date",array('size'=>20)) ?>
<?php echo $form->error($model,"[$index]signup_date"); ?>

</td>
<td></td>
<td></td>
<td></td>
<td>	<?php echo $form->errorSummary($model); ?></td>
</tr>