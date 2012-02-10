
<?php
$es  =$form->errorSummary($model);
if(isset($es)){
    echo '<tr><td colspan="5">' . $es .  '</td></tr>';
}
?>

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
                    '(:grade >= min_grade_allowed and :grade <= max_grade_allowed) and session_id = :sid',
                    array('grade' =>
                          $model->student->grade,
                          'sid' => ClassSession::savedSessionId())), 
                'id', 'summary'),
            'Outside Grade Range' =>
            CHtml::listData(
                ClassInfo::model()->findAll(
                    '(:grade < min_grade_allowed or :grade > max_grade_allowed) and session_id = :sid',
                    array('grade' => $model->student->grade,
                          'sid' => ClassSession::savedSessionId())), 
                
                    'id', 'summary'),
                ), 
            array('class' => 'chzn-select',
                  'empty' => "Choose a class",
                )); 
}

echo $form->error($model,"[$index]class_id"); 

?> 


</td>
<td>
<?php echo $form->textField($model,"[$index]signup_date",array('size'=>20)) ?>
<?php echo $form->error($model,"[$index]signup_date"); ?>

</td>
<td>
<?php echo $form->checkbox($model,"[$index]scholarship"); ?>
<?php echo $form->error($model,"[$index]scholarship"); ?>

</td>
<td>
<?php echo ZHtml::enumDropDownList( $model,"[$index]status"); 
echo '<div id="Signup_'. $index. '_additional_info"  >';
?>
</div>
    <?php echo $form->error($model,"[$index]status"); ?>

</td>
<td>
<?php echo $form->textField($model,"[$index]note",array('size'=>20,'maxlength'=>256)); ?>
<?php echo $form->error($model,"[$index]note"); ?>
</td>
<td>
<?php echo CHtml::link(
    '<img src="' .  Yii::app()->baseUrl . '/images/delete.png" alt="Delete" />', 
    '', 
    array(
        'class'=>'delete',
        'onClick'=>'deleteRow($(this))', 
   ));?>
</td>

</tr>


<?php Yii::app()->clientScript->registerCoreScript("jquery")?>

<script type="text/javascript">
	$(function() {

            function addAjax(id){

            $("#Signup_" + id + "_class_id").change(
                function(item){
                    cid = $('#Signup_' + id + '_class_id  option:selected').val();
                    $.ajax({
                        type:'POST', 
                                dataType: 'json',
                                data: {'id' : cid},
                                url:'<?= CController::createUrl('ClassInfo/json') ?>',
                                success: 
                            function(data){
                                $('#Signup_' + id + '_additional_info').html('signup #' + data['enrolled_count']  + '<br />(' + data['max_students'] + ' max)');
                                if(parseInt(data['enrolled_count']) > parseInt(data['max_students'])){
                                    $('#Signup_' + id + '_status').val('Waitlist');
                                } else{
                                    $('#Signup_' + id + '_status').val('Enrolled');
                                }
                                ;}
                        }
                        )})
                };



$.each(
    $('select').filter(function() {
        return this.id.match(/class_id/);
    }),
    function(i,s){
        id=s.id.match(/Signup_(\d+?)_class_id/)[1];
        addAjax(id);
    })


});

</script>