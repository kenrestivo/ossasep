<strong><?php echo CHtml::encode($model->class_name); ?></strong><br />


<?php
echo implode(CHtml::encode(' & '), 
        array_map(
            function($i) { return $i->full_name ; },
            $model->instructors
            ));

?>
<br />

<?php echo CHtml::encode($model->min_grade_allowed); ?> - <?php echo CHtml::encode($model->max_grade_allowed); ?> <br />
<?php echo CHtml::encode($model->start_time); ?> - <?php echo CHtml::encode($model->end_time); ?> <br />
<?php echo CHtml::encode($model->location); ?>
