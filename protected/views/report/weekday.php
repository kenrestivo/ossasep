<table>

<?php
  /*
    foreach($weekdays as $day => $classes){
    print $day . '<br />';
    foreach($classes as $class){
    print $class->class_name . '<br />';
    }
    }
  */





$lines = 1;
for($i=0; $lines > 0; $i++){
    print '<tr>';
    $got = 0;
    foreach($days as $day){
        if(isset($classes[$day][$i])){
            print '<td>' . $classes[$day][$i]->class_name . '</td>';
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