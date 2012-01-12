<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'check-income-grid',
	'dataProvider'=>new KArrayDataProvider(
                      $unassigned),
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>ZHtml::clickableRow('CheckIncome/view'),
	'columns'=>array(
		'check_num:ntext',
        'cash:boolean',
		'payer:ntext',
		'amount:currency',
		'check_date:date',
		'payee.name:text:Payee',
        'unassigned:currency:Un-Assigned',
		'deposit.deposited_date:date:Deposited On',
        'delivered:date',
        'returned:date',
		'session.summary:text:Session',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
		),
	),
)); ?>
