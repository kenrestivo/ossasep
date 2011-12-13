<table class="signupboxes" >
<tr>
<th>
<?php echo CHtml::encode('√'); ?>
</th>
<th>Class</th><th>Payment</th>
</tr>


<?php foreach($classes as $class){ ?>
     <tr><td>&nbsp;</td>
          <td><?= CHtml::encode($class->class_name) ?><td>
          <td></td>
     </tr>
<?php } ?>

</table>