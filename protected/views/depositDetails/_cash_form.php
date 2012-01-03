<table class="bordertable">
     <tr>
     <th>Quantity</th>
     <th>Denomination</th>
     <th>Amount</th>
     </tr>

     <tr>
     <td><?php echo $form->textField($model,'hundreds', array('size' => 3)); ?></td>
     <td><?php echo $form->labelEx($model,'hundreds'); 
echo $form->error($model,'hundreds'); ?></td>
<td></td></tr>

<tr>
<td><?php echo $form->textField($model,'fifties', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'fifties'); 
echo $form->error($model,'fifties'); 
?></td>
<td></td></tr>

<tr>
<td><?php echo $form->textField($model,'twenties', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'twenties');
echo $form->error($model,'twenties'); ?></td>
<td></td></tr>


<tr>
<td><?php echo $form->textField($model,'tens', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'tens');
echo $form->error($model,'tens'); ?></td>
<td></td></tr>


<tr>
<td><?php echo $form->textField($model,'fives', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'fives'); 
echo $form->error($model,'fives'); ?></td>
<td></td></tr>

<tr>
<td><?php echo $form->textField($model,'ones', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'ones'); 
echo $form->error($model,'ones'); ?></td>
<td></td></tr>


</table>