<table class="emailable">
  <tr>
    <th colspan="2" class="title" >
     <?php if(Yii::app()->user->name != 'admin'){
     echo CHtml::encode($model->class_name);
 } else {
     echo CHtml::link(CHtml::encode($model->class_name), 
                 array("/ClassInfo/view", 'id' => $model->id));
 }
     ?>

&nbsp;
      <span style="float:right"><?= $model->gradeSummary('short') ?></span>
    </th>
  </tr>

  <tr>
    <td colspan="2" class="title">
     <?php  
     $avail = $model->max_students - $model->enrolled_count;
if($avail > 0){
    echo CHtml::encode(sprintf("%d more space%s available", 
                               $avail,  
                               $avail > 1 ? 's' : ''));
} else  {
    echo "Class Full";
}
     ?>
    </td>
  </tr>



<?php

     $ps = "";
     foreach($model->sortedNoCancelled as $s){
         if($ps != $s->status){
             $i = 1;
             $ps = $s->status;
             if($ps == "Waitlist"){
                 echo '<tr class="waitlist"><th colspan="2">Waitlist</th></tr>';
             }
         }
         if($s->status == "Cancelled"){
             $cname = "strikethrough";
         } elseif ($s->status == "Waitlist"){
             $cname = "waitlist";
         } else {
             $cname = "";
         }
         $showi = $s->status == "Cancelled" ? "X" : $i;
         $ini = substr($s->student->last_name, 0,1);
         echo "<tr class=\"$cname\"><td>{$s->student->first_name} $ini.</td>";
         echo '<td class="grade">'. Yii::app()->format->gradeShort($s->student->grade) . '</td></tr>';
         $i++; 
     }


?>
 
</table>