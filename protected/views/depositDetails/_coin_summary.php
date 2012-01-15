<table class="bordertable financial">
<tr>
<th colspan="3">COIN RECONCILIATION</th>
</tr>

     <tr>
     <th>Quantity</th>
     <th>Denomination</th>
     <th>Amount</th>
     </tr>

 <tr><td><?= Yii::app()->format->noZero($model->pennies) ?></td><td><?= $model->getAttributeLabel('pennies'); ?></td><td><?= Yii::app()->format->currency($model->pennies_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->nickels) ?></td><td><?= $model->getAttributeLabel('nickels'); ?></td><td><?= Yii::app()->format->currency($model->nickels_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->dimes) ?></td><td><?= $model->getAttributeLabel('dimes'); ?></td><td><?= Yii::app()->format->currency($model->dimes_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->quarters) ?></td><td><?= $model->getAttributeLabel('quarters'); ?></td><td><?= Yii::app()->format->currency($model->quarters_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->dollar_coins) ?></td><td><?= $model->getAttributeLabel('dollar_coins'); ?></td><td><?= Yii::app()->format->currency($model->dollar_coins_total) ?></td></tr>

<tr><th colspan="2">SUBTOTAL COIN</th>
     <th><?= Yii::app()->format->currencyZero($model->subtotal_coin) ?></th>
</tr>

</table>
