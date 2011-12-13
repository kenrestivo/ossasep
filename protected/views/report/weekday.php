<table>

<?php

print '<tr>';
foreach($days as $day){
    print '<th>' .  CHtml::encode(ZHtml::weekdayTranslation($day)). '</th>';
}
print '</tr>';


$lines = 1;
for($i=0; $lines > 0; $i++){
    print '<tr>';
    $got = 0;
    foreach($days as $day){
        if(isset($classes[$day][$i])){
            print '<td>' . CHtml::encode($classes[$day][$i]->class_name) . '</td>';
            $got++;
        }
    }
    print '</tr>';
    if($got < 1){
        $lines = 0;
    }
}

?>

</table>