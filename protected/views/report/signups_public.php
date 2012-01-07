<h1>Enrollment Status for <?= $this->savedSessionSummary() ?></h1>

<p>Students listed in order of application/payment received.</p>

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
