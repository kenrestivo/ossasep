<div>

<strong><u><?= $model->class_name ?></u></strong> with <?= CHtml::encode($model->instructorNames(' and ')) ?> <br />

<span>Number of students: 

<?php if($model->min_students > 0){  ?>
<?= $model->min_students ?> -  <?= $model->max_students  ?>

                                     <?php }  else  { ?>
up to <?= $model->max_students  ?>
     <? } ?>

</span>
<span>
Grades: <?= $this->renderPartial('/classInfo/_gradesummary', array('model' => $model)) ?>
</span>

<span>
     <?= ZHtml::weekdayTranslation($model->day_of_week) ?>s, 
<?php echo ZHtml::militaryToCivilian($model->start_time); ?> - <?php echo ZHtml::militaryToCivilian($model->end_time); ?> 
</span>
<span>
<?= CHtml::encode($model->location) ?>
</span>
<br />


$<?= $model->cost_per_class ?> per week for an
<?= $model->meetingCount ?>-week session
<br />

</div>