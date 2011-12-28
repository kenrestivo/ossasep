<h1>OSSPTO-paid Instructors</h1>

<table class="bordertable">
<tr><th>Instructor</th><th>Owed</th><th>Paid</th><th>Delivered</th></tr>
<?php
foreach($instructors as $i){
    echo "<tr>";
    echo "<td>" . $i->full_name . '</td>';
    echo "<td>";
    $this->renderPartial(
        '_class_payment_instructor',
        array('assignments' =>$i->instructor_assignments));
    echo '</td>';
    echo '<td>' .  Yii::app()->format->currency($i->paid) .'</td>';
    echo '<td>' .  Yii::app()->format->currency($i->delivered) .'</td>';
    echo "</tr>";
}
?>
</table>