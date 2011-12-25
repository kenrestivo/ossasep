<h1>Signup Checkboxes</h1>
<table class="bordertable" >
<tr>
<th>
<?php echo CHtml::encode('√'); ?>
</th>
<th>Class</th>
<th>Payment</th>
</tr>


<?php foreach($classes as $class){ ?>
     <tr>
          <td></td>
          <td>
                          <?= CHtml::link(CHtml::encode($class->class_name), array('/ClassInfo/view', 'id'=>$class->id)) ?>
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