<table class="bordertable financial">
<tr>
<th colspan="2">CASH</th>
</tr>

     <tr>
     <th>Quantity</th>
     <th>Denomination</th>
     </tr>

<tr>
    <td><?php echo $form->textField($model,'ones', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'ones');
echo $form->error($model,'ones'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'fives', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'fives');
echo $form->error($model,'fives'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'tens', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'tens');
echo $form->error($model,'tens'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'twenties', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'twenties');
echo $form->error($model,'twenties'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'fifties', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'fifties');
echo $form->error($model,'fifties'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'hundreds', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'hundreds');
echo $form->error($model,'hundreds'); ?></td>
</tr>

</table>


<table class="bordertable financial">
<tr>
<th colspan="2">COINS</th>
</tr>

     <tr>
     <th>Quantity</th>
     <th>Denomination</th>
     </tr>
<tr>
    <td><?php echo $form->textField($model,'pennies', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'pennies');
echo $form->error($model,'pennies'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'nickels', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'nickels');
echo $form->error($model,'nickels'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'dimes', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'dimes');
echo $form->error($model,'dimes'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'quarters', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'quarters');
echo $form->error($model,'quarters'); ?></td>
</tr>
<tr>
    <td><?php echo $form->textField($model,'dollar_coins', array('size' => 3)); ?></td>
<td><?php echo $form->labelEx($model,'dollar_coins');
echo $form->error($model,'dollar_coins'); ?></td>
</tr>



</table>

