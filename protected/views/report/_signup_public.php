<table class="bordertable">
  <tr>
    <th colspan="3" >
      <?= CHtml::link($model->class_name, 
        array("/ClassInfo/view", 'id' => $model->id)) ?>
      <span style="float:right"><?= $model->gradeSummary('short') ?></span>
    </th>
  </tr>
  <tr>
    <td colspan="3">
      <?= CHtml::encode($model->instructorNames(' and ')) ?>
    </td>
  </tr>
  <tr>
    <td>num</td>
    <td>student</td>
    <td>grade</td>
  </tr>
</table>

<?php
  


$kad = new KArrayDataProvider(
$model->sortedSignups,
array('keyField' => 'student_id,class_id',
));

?>

