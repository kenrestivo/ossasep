<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'deposited_date:date',
		'total_calculated:currency:Total Deposit',
		'subtotal_checks:currency:Checks Subtotal',
		'subtotal_cash_payments:currency:Cash Subtotal',
		'subtotal_reconciliation:currency:Cash Reconciliation Subtotal',
		'discrepancy:currency:Discrepancy',
        'note',
        'session.summary:text:Session',
	),
)); ?>


<?php
      echo CHTML::link(CHtml::encode("Edit  ". $model->summary), 
                 array('update', 'id'=>$model->id,
                       'returnTo' => Yii::app()->request->requestUri));

?> &nbsp;<?php
echo CHTML::link(CHtml::encode("Delete  ". $model->summary), 
                 array('#', 
                       'linkOptions'=>array(
                           'submit'=>array(
                               'delete',
                               'id'=>$model->id),
                           'confirm'=>'Are you sure you want to delete this item?')));

