<tr>
          <td class="short"><span class="spacer">&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
          <td>
<?php
if(Yii::app()->user->name != 'admin'){
    echo CHtml::encode($class->class_name);
} else {
    echo CHtml::link(CHtml::encode($class->class_name), array('/ClassInfo/view', 'id'=>$class->id)); 
}      
     ?>
          <?=$class->gradeSummary('long')?>
          </td>
          <td>$<?= $class->costSummary ?> to 
          <?php 
                          $coname = $class->company->name;
                          if($class->is_company){
                              echo "<strong>" . CHtml::encode($coname) . "</strong>";
                          } else {
                              echo CHtml::encode($coname);

                          }
                         ?>
                          </td>
     </tr>
