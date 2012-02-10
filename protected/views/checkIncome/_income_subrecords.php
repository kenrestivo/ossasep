<table>
<tr><th>Class</th><th>Amount</th><th></th></tr>
<?php foreach($income as $i=>$inc): ?>
<tr>
    <td><?php echo $inc->class->summary . " (". $inc->class->company->name . ")"; 
          echo CHtml::activeHiddenField($inc,"[$i]class_id"); 
         echo CHtml::activeHiddenField($inc,"[$i]student_id"); ?></td>
<td><?php echo CHtml::activeTextField($inc,"[$i]amount");?></td>
<td>
<?php echo CHtml::link(
    'Un-assign', 
    '', 
    array(
        'class'=>'delete',
        'onClick'=>'deleteRow($(this))', 
   ));?>
</td>
</tr>
<?php endforeach; ?>
</table>
