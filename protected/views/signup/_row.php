
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
                                data: {'Signup[class_id]' : cid},
                                url:'<?= CController::createUrl('ClassInfo/json') ?>',
                                success: 
                            function(data){
                                $('#Signup_' + id + '_additional_info').text('Student ' + data['enrolled_count'] + ' of ' + data['max_students']);
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