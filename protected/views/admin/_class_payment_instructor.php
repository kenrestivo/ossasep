<?php

    $owed = 0.0;
    echo '<table class="catalog">';
    foreach($assignments as $c){
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

?>