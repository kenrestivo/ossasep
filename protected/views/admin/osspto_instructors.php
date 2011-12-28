<h1>OSSPTO-paid Instructors</h1>

<table class="bordertable">
<tr><th>Instructor</th><th>Classes</th><th>Received</th><th>Paid</th><th>Delivered</th></tr>
<?php
foreach($instructors as $i){
    echo "<tr>";
    echo "<td>" . $i->full_name . '</td>';
    echo "<td>";
    $owed = 0.0;
    echo '<table class="catalog">';
    foreach($i->instructor_assignments as $c){
    echo "<tr>";
        $s = $c->split($c->class->paid);
        $owed += $s;
        echo '<td>'.CHtml::encode($c->class->summary) . '</td>';
        echo '<td>'. Yii::app()->format->percent($c->percentage) . '</td>';
        echo '<td>'.Yii::app()->format->currency($s) . '</td>';
        echo "</tr>";
    }
    echo '<td>Total</td><td></td><td>' . Yii::app()->format->currency($owed).'</td>';
    echo '</table>';
    echo '</td>';
    echo '<td>'.Yii::app()->format->currency($owed).'</td>';
    echo '<td>' .  Yii::app()->format->currency($i->paid) .'</td>';
    echo '<td>' .  Yii::app()->format->currency($i->delivered) .'</td>';
    echo "</tr>";
}
?>
</table>