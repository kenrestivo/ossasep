<h1>Data Integrity Check/Audit</h1>

<h3>Unbalanced, unreturned checks with unassigned amounts</h3>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'check-income-grid',
	'dataProvider'=>new KArrayDataProvider(
                      $unassigned),
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>ZHtml::clickableRow('CheckIncome/view'),
    'emptyText' => "Everything OK, no problems found!",
    'showTableOnEmpty' => false,
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


<h3>Classes with instructors whose total assignment is not 100%</h3>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'class-info-grid',
	'dataProvider'=>new KArrayDataProvider(
                      $instructorbalance),
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=> ZHtml::clickableRow('ClassInfo/view'),
    'emptyText' => "Everything OK, no problems found!",
    'showTableOnEmpty' => false,
	'columns'=>array(
		'class_name:text:Name',
		'unbalanced_instructors:percent:Unbalanced Instructor Total',
		'min_grade_allowed:grade:Min Grade',
		'max_grade_allowed:grade:Max Grade',
        array('name' => 'Weekday',
              'value' => 'ZHtml::weekdayTranslation($data->day_of_week)'),
		'location:text:Location',
		'company.name:ntext:Company',
		'status:text:Status',
		'session.summary:text:Session',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
		),
	),
)); 
