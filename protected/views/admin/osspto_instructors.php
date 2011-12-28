<h1>OSSPTO-paid Instructors</h1>

<table class="bordertable">
<?php
foreach($instructors as $i){
    echo "<tr>";
    echo "<td>" . $i->full_name . '</td>';
    echo "<td>";
    $owed = 0.0;
    foreach($i->instructor_assignments as $c){
        $s = $c->split($c->class->paid);
        $owed += $s;
        echo $c->class->class_name . ' ' . $c->percentage . ' ' . $s;
        echo '<br />';
    }

    echo '</td>';
    echo "<td>$owed</td>";
    echo '<td>' .  $i->paid .'</td>';
    echo '<td>' .  $i->delivered .'</td>';
    echo "</tr>";
}
?>
</table>