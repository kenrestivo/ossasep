<?php   Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/printabletable.css', 'print'); ?>

<div class="span-10">
<img src="<?= Yii::app()->request->baseUrl; ?>/images/CashCheckReconciliation-img1.jpg" alt="logo" />

<p><br /><strong>CASH, COIN, and CHECK RECONCILIATION WORKSHEET</strong></p>

</div>


<div class="span-12 last">

<p><strong>Deposit #<?= $model->id ?></strong> </p>

<p><strong>Prepared by</strong>: <?= CHtml::encode($model->note) ?></p>
     
<p><strong>Submitted On</strong>: <?= Yii::app()->format->date($model->deposited_date) ?></p>
</div>

<div class="clear"></div>



<div class="span-10">

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


<p><strong>TOTAL DEPOSIT</strong>  <?= Yii::app()->format->currencyZero($model->total_submitted)  ?></p> 




<hr />
<p>Date _______________       OSSPTO Account _____________</p>


<p>Approval ______________</p>

     <p>Notes: <br /><br /><br /></p>