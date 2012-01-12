
<table class="bordertable">
<tr>
<th colspan="3">CHECK DEPOSIT</th>
</tr>

     <tr>
     <th>Name</th>
     <th>Check #</th>
     <th>Amount</th>
     </tr>


<?
 foreach($model->checks as $check){
     echo '<tr>';
     echo '<td>' . CHtml::encode($check->payer)  . '</td>';
     echo '<td class="financial">' . CHtml::encode($check->check_num)  . '</td>';
     echo '<td class="financial">' . Yii::app()->format->currency($check->amount)  . '</td>';
     echo '</tr>';
 }
?>


<tr>
<th colspan="2">SUBTOTAL CHECKS</th>
<th ><?= Yii::app()->format->currency($model->subtotal_checks) ?></th>
</tr>

</table>

