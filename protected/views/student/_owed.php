<table style="items">
<tr><th>Class</th><th>Owed To</th><th>Amount</th></tr>
<?php 
    $payees= array();
foreach($model->owed as $owed){
    echo '<tr><td>' . $owed['class']->class_name . "</td><td>". $owed['payee']->name . "</td><td>" . $owed['amount'] . "</td></tr>";
    $payees[$owed['payee']->id]= $owed['payee'];
}

echo '</table>';




/// TODO: move this to a menu?
foreach($payees as $p){
    echo '<span class="span-11">';

    echo CHTML::link("Add New Check to ". $p->name . " for " . $model->full_name . '<br />', 
                 array("CheckIncome/multiEntry",
                       'student_id' => $model->id,
                       'company_id' => $p->id,
                       'returnTo' => Yii::app()->request->requestUri));
    echo "</span><span class=\"span-9 last\">";
    $un = CheckIncome::underAssignedChecks(null, $p->id);
    if(count($un) > 0){
        echo "Or pick from one of these checks:<br />";
    }
    foreach($un as $check){
        echo CHTML::link($check->summary,
                 array("Income/create",
                       'student_id' => $model->id,
                       'company_id' => $p->id,
                       'returnTo' => Yii::app()->request->requestUri));
        echo CHtml::encode(': '). Yii::app()->format->currency(-$check->unassigned) . ' available';
        echo '<br />';


    }
    echo "</span><br />";


}

?>

<div class="clear"></div>

<?php
if(count($payees) < 1){
    echo "<em>All paid up! Nothing owed.</em>";
}
?>