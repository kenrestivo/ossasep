<div class="span-10">
<img src="<?= Yii::app()->request->baseUrl; ?>/images/CashCheckReconciliation-img1.jpg" alt="logo" />

<p><br /><strong>CASH, COIN, and CHECK RECONCILIATION WORKSHEET</strong></p>


<?php $this->renderPartial("_cash_summary", 
                     array('model' => $model)); ?>

<?php  $this->renderPartial("_coin_summary", 
                     array('model' => $model)); ?>


</div>


<div class="span-12 last">
<?php $this->renderPartial("_check_summary", 
                     array('model' => $model)); ?>

</div>
<div class="clear"></div>
<p><strong>TOTAL DEPOSIT<strong>  <?= Yii::app()->format->currency($model->total_submitted)  ?></p> 



