<div class="view">


  <b><?php echo CHtml::encode($data->getAttributeLabel('class_name')); ?>:</b>
  <?php echo CHtml::link(
      CHtml::encode($data->class_name),
      array('view', 'id'=>$data->id)); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('min_grade_allowed')); ?>:</b>
  <?php echo CHtml::encode($data->min_grade_allowed); ?>

  <b><?php echo CHtml::encode($data->getAttributeLabel('max_grade_allowed')); ?>:</b>
  <?php echo CHtml::encode($data->max_grade_allowed); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
  <?php echo CHtml::encode($data->start_time); ?>

  <b><?php echo CHtml::encode($data->getAttributeLabel('end_time')); ?>:</b>
  <?php echo CHtml::encode($data->end_time); ?>
  <br />

  <b>
  <?php echo CHtml::encode($data->getAttributeLabel('cost_per_class')); ?>:</b>
  <?php echo CHtml::encode($data->cost_per_class); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('max_students')); ?>:</b>
  <?php echo CHtml::encode($data->max_students); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('day_of_week')); ?>:</b>
  <?php echo CHtml::encode(ZHtml::weekdayTranslation($data->day_of_week)); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
  <?php echo CHtml::encode($data->location); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
  <?php echo CHtml::encode($data->status); ?>
  <br />
  <b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b>
  <?php echo CHtml::encode($data->company->name); ?>
  <br />

  <b><?php echo CHtml::encode($data->getAttributeLabel('session_id')); ?>:</b>
  <?php echo CHtml::encode($data->session->summary); ?>
  <br />




</div>