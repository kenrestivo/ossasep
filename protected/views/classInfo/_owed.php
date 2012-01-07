

<table style="items">
     <tr><th>Class</th><th>Status</th><th>Amount Receivable</th></tr>


     <?php 

     $students = array();
foreach($model->sortedSignups as $s){
    $owed = $s->owed;
    if($owed != 0){
        $students[] = $s->student;
        echo '<tr><td>' . CHtml::encode($s->student->summary) . "</td><td>". $s->status . "</td><td>" . Yii::app()->format->currencyZero($s->owed) . "</td></tr>";
    }
 }

    ?>

        </table>


<?php

foreach($students as $st){
    echo '<span class="span-11">';

    echo CHTML::link(CHtml::encode("Add New Check for ". $st->full_name) .  '<br />', 
                 array("CheckIncome/multiEntry",
                       'student_id' => $st->id,
                       'class_id' => $model->id,
                       'company_id' => $model->company_id,
                       'returnTo' => Yii::app()->request->requestUri));



    echo "</span><span class=\"span-9 last\">";
    $un = CheckIncome::underAssignedChecks(null, $st->id);
    if(count($un) > 0){
        echo "Or pick from one of these checks:<br />";
    }
    foreach($un as $check){
        echo CHTML::link($check->summary,
                 array("Income/create",
                       'check_id' => $check->id,
                       'student_id' => $st->id,
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));
        echo CHtml::encode(': '.Yii::app()->format->currency($check->unassigned) . ' available');
        echo '<br />';


    }
    echo "</span><br />";


}

?>

<div class="clear"></div>

<?php
if(count($students) < 1){
    echo "<em>All paid up! Nothing owed.</em>";
}
?>
