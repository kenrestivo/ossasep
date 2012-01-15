
<table class="bordertable financial">
<tr>
<th colspan="3">CASH RECONCILIATION</th>
</tr>

     <tr>
     <th>Quantity</th>
     <th>Denomination</th>
     <th>Amount</th>
     </tr>

<tr><td><?= Yii::app()->format->noZero($model->ones) ?></td><td><?= $model->getAttributeLabel('ones'); ?></td><td><?= Yii::app()->format->currency($model->ones_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->fives) ?></td><td><?= $model->getAttributeLabel('fives'); ?></td><td><?= Yii::app()->format->currency($model->fives_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->tens) ?></td><td><?= $model->getAttributeLabel('tens'); ?></td><td><?= Yii::app()->format->currency($model->tens_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->twenties) ?></td><td><?= $model->getAttributeLabel('twenties'); ?></td><td><?= Yii::app()->format->currency($model->twenties_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->fifties) ?></td><td><?= $model->getAttributeLabel('fifties'); ?></td><td><?= Yii::app()->format->currency($model->fifties_total) ?></td></tr>
<tr><td><?= Yii::app()->format->noZero($model->hundreds) ?></td><td><?= $model->getAttributeLabel('hundreds'); ?></td><td><?= Yii::app()->format->currency($model->hundreds_total) ?></td></tr>

<tr><th colspan="2">SUBTOTAL CASH</th>
     <th><?= Yii::app()->format->currencyZero($model->subtotal_cash) ?></th>
</tr>

</table>

