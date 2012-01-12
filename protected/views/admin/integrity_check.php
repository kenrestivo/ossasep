<h3>Checks with unassigned amounts</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'check-income-grid',
	'dataProvider'=>new KArrayDataProvider(
                      $unassigned),
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>ZHtml::clickableRow('CheckIncome/view'),
	'columns'=>array(
		'check_num:ntext:Check #',
		'amount:currency:Total Check Amount',
        'unassigned:currency:Un-Assigned',
        'cash:boolean:Cash?',
		'payer:ntext:Payer',
		'check_date:date:Check Date',
		'payee.name:text:Payee',
		'deposit.deposited_date:date:Deposited On',
        'delivered:date:Delivered to Company',
        'returned:date:Returned to Student',
		'session.summary:text:Session',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
		),
	),
)); ?>
