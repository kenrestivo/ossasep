<table class="schedule" >
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
        echo '<td>';
        if(isset($classes[$day][$i])){
            echo  $this->renderPartial(
                         '_cell', 
                         array('model'=>$classes[$day][$i]));
            $got++;
        }
        echo'</td>';
    }
    print '</tr>';
    if($got < 1){
        $lines = 0;
    }
}

?>

</table>


<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<script type="text/javascript">

$(function(){
        $(".full").each(function(i){$(this).parent().addClass('waitlist')});
        $(".cancelled").each(function(i){$(this).parent().addClass('strikethrough')});
    });

</script>