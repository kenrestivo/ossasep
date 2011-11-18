<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

<h3>Instructor Types</h3>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructortype-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $data->instructor_types,
                      array('keyField' => 
                            'requirement_type_id,instructor_type_id',
                          )),
                  'columns'=>array(
                      array('name' => "Required For",
                            'value' => '$data->description'),
                      ),
                  )); ?>


</div>