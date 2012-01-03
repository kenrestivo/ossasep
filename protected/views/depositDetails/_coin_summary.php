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
