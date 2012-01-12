
<img src="<?= Yii::app()->request->baseUrl; ?>/images/CashCheckReconciliation-img1.jpg" alt="logo" />

<p><strong>CASH, COIN, and CHECK RECONCILIATION WORKSHEET</strong></p>


<?php $this->renderPartial("_cash_summary", 
                     array('model' => $model)); ?>

<?php  $this->renderPartial("_coin_summary", 
                     array('model' => $model)); ?>




<p><strong>TOTAL DEPOSIT<strong>  <?= Yii::app()->format->currency($model->total_submitted)  ?></p> 



<?php $this->renderPartial("_check_summary", 
                     array('model' => $model)); ?>




