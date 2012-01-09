<?php

$daysoff = $model->days_off;

?>
<span class="span-14">
<strong>Scheduled Meetings:</strong>
<?php
echo     implode(', ',
            array_map(
                function($i) { return $i->notated_date ; },
                $meetings
                ));
?>
</span>
<span class="span-5 last">
<?php 
if(count($daysoff) > 0){
    echo CHtml::encode('--');
    echo  'No classes on ' .   implode(', ',
            array_map(
                function($i) { return ZHtml::shortDate($i->school_day) ; },
                $daysoff
                ));

}
?>
</span>
<br />
<span class="span-12">
    &nbsp;
</span>
<span class="span-6 last">
<?php
// the notes
$notes = array();
foreach($meetings as $mtg){
    if($mtg->note != ''){
        $notes[] = $mtg;
    }
}
if(count($notes) > 0){
    echo  CHtml::encode('--');
    foreach($notes as $m){
        echo  CHtml::encode('*' . $m->note) . " on " . CHtml::encode(ZHtml::shortDate($m->meeting_date)). '<br />';
    }

}


?>
</span>
