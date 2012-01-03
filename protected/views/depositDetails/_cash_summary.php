
<table class="bordertable">
<tr>
<th colspan="3">CASH RECONCILIATION</th><th></th><th></th>
</tr>

     <tr>
     <th>Quantity</th>
     <th>Denomination</th>
     <th>Amount</th>
     </tr>
<tr><td><?= $model->ones ?></td><td><?= CHtml::activeLabelEx($model,'ones'); ?></td><td></td></tr>
<tr><td><?= $model->fives ?></td><td><?= CHtml::activeLabelEx($model,'fives'); ?></td><td></td></tr>
<tr><td><?= $model->tens ?></td><td><?= CHtml::activeLabelEx($model,'tens'); ?></td><td></td></tr>
<tr><td><?= $model->twenties ?></td><td><?= CHtml::activeLabelEx($model,'twenties'); ?></td><td></td></tr>
<tr><td><?= $model->fifties ?></td><td><?= CHtml::activeLabelEx($model,'fifties'); ?></td><td></td></tr>
<tr><td><?= $model->hundreds ?></td><td><?= CHtml::activeLabelEx($model,'hundreds'); ?></td><td></td></tr>

</table>



<table class="bordertable">
<tr>
<th colspan="3">COIN RECONCILIATION</th><th></th><th></th>
</tr>

     <tr>
     <th>Quantity</th>
     <th>Denomination</th>
     <th>Amount</th>
     </tr>

 <tr><td><?= $model->pennies ?></td><td><?= CHtml::activeLabelEx($model,'pennies'); ?></td><td></td></tr>
<tr><td><?= $model->nickels ?></td><td><?= CHtml::activeLabelEx($model,'nickels'); ?></td><td></td></tr>
<tr><td><?= $model->dimes ?></td><td><?= CHtml::activeLabelEx($model,'dimes'); ?></td><td></td></tr>
<tr><td><?= $model->quarters ?></td><td><?= CHtml::activeLabelEx($model,'quarters'); ?></td><td></td></tr>
<tr><td><?= $model->dollar_coins ?></td><td><?= CHtml::activeLabelEx($model,'dollar_coins'); ?></td><td></td></tr>



</table>
