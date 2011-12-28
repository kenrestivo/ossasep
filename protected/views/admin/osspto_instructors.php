<h1>OSSPTO-paid Instructors</h1>

<table class="bordertable">
<?php
foreach($instructors as $i){
    echo "<tr>";
    echo "<td>" . $i->full_name . '</td>';
    echo "<td>";
    foreach($i->instructor_assignments as $c){
        echo $c->class->class_name . ' ' . $c->percentage . ' ';
        echo $c->split($c->class->paid);
        echo '<br />';
    }

    echo '</td>';


    echo "</tr>";
}
?>
</table>