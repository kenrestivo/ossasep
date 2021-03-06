<?php 

  // TODO: this needs to be refactored in a huge way, to be more MVC-ish.
  // move most of this code to the controller, just do the formatting here instead.
$full = $model->full;
?>

<div class="<?= $full ? 'waitlist catalog' : 'catalog' ?>" >

<?php if($model->status == 'New'){ ?>
<strong><em>NEW CLASS</em></strong><br />
                                   <?php } ?>

<strong><u>
<?
if(Yii::app()->user->name != 'admin'){
    echo CHtml::encode($model->class_name);
} else {
    echo CHtml::link(CHtml::encode($model->class_name), array('/ClassInfo/view', 'id'=>$model->id)); 
}
?>
</u></strong> with <?= CHtml::encode($model->instructorNames(' and ')) ?> 
<?php
    if($model->company->use_publicly > 0){
        echo " of " . $model->company->name;
    }
if($full){
      echo '<span class="full">FULL</span>';
} 

?>
<br />

<span class="span-6">Number of students: 

<?php if($model->min_students > 1){  ?>
<?= $model->min_students ?> -  <?= $model->max_students  ?>

                                     <?php }  else  { ?>
up to <?= $model->max_students  ?>
     <? } ?>

</span>
<span class="span-5">
    Grades: <?= $model->gradeSummary('long') ?>
</span>

<span class="span-7">
     <?= ZHtml::weekdayTranslation($model->day_of_week) ?>s, 
<?php echo ZHtml::militaryToCivilian($model->start_time); ?> - <?php echo ZHtml::militaryToCivilian($model->end_time); ?> 
</span>
<span class="span-4 last">
<?= CHtml::encode($model->location) ?>
</span>
<br />

<br />

$<?= $model->cost_per_class ?> per week for an
    <?= $model->active_mtg_count ?>-week session

<?php 
     foreach($model->extra_fees as $fee){
         echo " plus $" . $fee->amount . " for " . $fee->description;
     }
?>
;

<u>please make $<?= $model->costSummary ?> check payable to   <?= $model->company->name;?>
</u>
<br />
<br />
<?php
    $this->renderPartial(
        '/classInfo/_meeting_formatted',
        // note! we're using ALL meetings, including makeup sessions, not active
        array('model' => $model));
?>

<div class="clear"></div>
<div>

<?php
  $d = $model->description;
if($model->description->language_id != Language::savedLanguageId()){
	echo "<div class='langnotfound'>(" . Language::current()->description . 
		   " translation not available, showing English)</div>";
}

echo "<div>" . nl2br(CHtml::encode($d->description)) . "</div>";

?>

</div>
</div>