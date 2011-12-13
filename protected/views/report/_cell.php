<strong><?php echo CHtml::encode($model->class_name); ?></strong><br />


<?php
echo implode(CHtml::encode(' & '), 
        array_map(
            function($i) { return $i->full_name ; },
            $model->instructors
            ));

?>
<br />

<?php echo ZHtml::gradeFormat($model->min_grade_allowed); ?> - <?php echo ZHtml::gradeFormat($model->max_grade_allowed); ?> <br />
<?php echo ZHtml::militaryToCivilian($model->start_time); ?> - <?php echo ZHtml::militaryToCivilian($model->end_time); ?> <br />
<?php echo CHtml::encode($model->location); ?>
