<h1>Signup Sheet for <?= $this->savedSessionSummary() ?></h1>


<table class="signups" >
<?php

print '<tr>';
foreach($days as $day){
    print '<th>' .  CHtml::encode(ZHtml::weekdayTranslation($day)). '</th>';
}
print '</tr>';

print '<tr>';
    foreach($days as $day){
        echo '<td>';
        foreach($classes[$day] as $c){
            echo  $this->renderPartial(
                         '_signup_public', 
                         array('model'=>$c));
        }
        echo'</td>';
    }
print '</tr>';

?>

</table>
