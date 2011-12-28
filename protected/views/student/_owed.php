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
    echo CHTML::link("Add Check to ". $p->name . " for " . $model->full_name . '<br />', 
                 array("CheckIncome/multiEntry",
                       'student_id' => $model->id,
                       'company_id' => $p->id,
                       'returnTo' => Yii::app()->request->requestUri));


}

?>



<?php
if(count($payees) < 1){
    echo "<em>All paid up! Nothing owed.</em>";
}
?>