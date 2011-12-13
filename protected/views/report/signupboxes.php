<table class="schedule" >
<tr>
<th>
<?php echo CHtml::encode('√'); ?>
</th>
<th>Class</th>
<th>Payment</th>
</tr>


<?php foreach($classes as $class){ ?>
     <tr>
          <td>&nbsp;</td>
          <td>
          <?= CHtml::encode($class->class_name) ?>
                          <?= $this->renderPartial(
                              '/classInfo/_gradesummary', 
                              array('model' => $class)) ?>
          </td>
          <td>$<?= $class->costSummary ?> to 
          <?php 
                          $coname = $class->company->name;
                          if($class->isCompany()){
                              echo "<strong>" . CHtml::encode($coname) . "</strong>";
                          } else {
                              echo CHtml::encode($coname);
                          }
                          ?>
                          </td>
     </tr>
<?php } ?>

</table>