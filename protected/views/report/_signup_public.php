<table class="bordertable">
  <tr>
    <th colspan="3" >
      <?= CHtml::link($model->class_name, 
                      array("/ClassInfo/view", 'id' => $model->id)) ?>&nbsp;
      <span style="float:right"><?= $model->gradeSummary('short') ?></span>
    </th>
  </tr>
  <tr>
    <td colspan="3">
      <?= CHtml::encode($model->instructorNames(' and ')) ?>
    </td>
  </tr>


<?php

     $ps = "";
     foreach($model->sortedCancelled as $s){
         if($ps != $s->status){
             $i = 1;
             $ps = $s->status;
             if($ps == "Waitlist"){
                 echo '<tr><th colspan="3">Waitlist</th></tr>';
             }
         }
         $cname = $s->status == "Cancelled" ? "strikethrough" : "";
         $showi = $s->status == "Cancelled" ? "X" : $i;
         echo "<tr class=\"$cname\"><td>$showi</td><td>{$s->student->full_name}</td><td>". Yii::app()->format->gradeShort($s->student->grade) . '</td></tr>';
         $i++; 
     }


?>

 
</table>