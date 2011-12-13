<div class="catalog" >

<?php if($model->status == 'New'){ ?>
<strong><em>NEW CLASS</em></strong><br />
                                   <?php } ?>

<strong><u>
     <?= CHtml::link($model->class_name, 
                     array("/ClassInfo/view", 'id' => $model->id)) ?>
</u></strong> with <?= CHtml::encode($model->instructorNames(' and ')) ?> <br />

<span class="span-6">Number of students: 

<?php if($model->min_students > 0){  ?>
<?= $model->min_students ?> -  <?= $model->max_students  ?>

                                     <?php }  else  { ?>
up to <?= $model->max_students  ?>
     <? } ?>

</span>
<span class="span-5">
Grades: <?= $this->renderPartial('/classInfo/_gradesummary', array('model' => $model)) ?>
</span>

<span class="span-6">
     <?= ZHtml::weekdayTranslation($model->day_of_week) ?>s, 
<?php echo ZHtml::militaryToCivilian($model->start_time); ?> - <?php echo ZHtml::militaryToCivilian($model->end_time); ?> 
</span>
<span class="span-4 last">
<?= CHtml::encode($model->location) ?>
</span>
<br />

<br />

$<?= $model->cost_per_class ?> per week for an
     <?= count($meetings) ?>-week session

<?php 
     foreach($model->extra_fees as $fee){
         echo "plus $" . $fee->amount . " for " . $fee->description;
     }
?>
;

<u>please make $<?= $model->costSummary ?> check payable to   <?= $model->company->name;?>
</u>
<br />
<br />
<strong>Scheduled Meetings:</strong>
<?php
echo     implode(', ',
            array_map(
                function($i) { return $i->notated_date ; },
                $meetings
                ));

// the notes
if(count($meetings) > 0){
    echo '&nbsp;' . CHtml::encode('--');
}
foreach($meetings as $mtg){
    if($mtg->note != ''){
        echo  CHtml::encode('*' . $mtg->note) . " on " . CHtml::encode(ZHtml::shortDate($mtg->meeting_date)). '<br />';
    }
}
?>

No classes on        

<?php
echo     implode(', ',
            array_map(
                function($i) { return $i->school_day ; },
                $model->daysOff
                ));


?>
<br />
<br />
<?= CHtml::encode($model->description) ?>
</div>