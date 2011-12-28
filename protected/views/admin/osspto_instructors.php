<h1>OSSPTO-paid Instructors</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'instructor-grid',
	'dataProvider'=>new KArrayDataProvider(
        $model,
        array(          'pagination' => false)),
	'columns'=>array(
		'full_name',
        'owed',
        'paid',
        'delivered',
	),
)); ?>
