<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

<h3>Requirements</h3>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'requirementtype-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $data->requirements,
                      array('keyField' => 
                            'instructor_type_id,requirement_type_id',
                          )),
                  'columns'=>array(
                      array('name' => "Required Items",
                            'value' => '$data->description'),
                      ),
                  )); ?>


</div>