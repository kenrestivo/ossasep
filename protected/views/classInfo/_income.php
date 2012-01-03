<?php

$attributes = array(
    'student.full_name:text:Student', 
    'amount:currency:Amount Assigned',
    'check.check_num:ntext:Check #',
    'check.payer:text:Payer',
    'check.amount:currency:Total Check Amount',
    'check.check_date:date:Check Date',
    );

if($model->is_company){
    $attributes[]=    'check.delivered:date:Delivered to Company';
} else {
    $attributes[]=  'check.deposit.deposited_date:date:Deposited';

}

$attributes[] =   array(
    'class'=>'CompositeButtonColumn',
    'modelClassName' => 'Income',
    'template'=>'{update}{delete}',
    'returnTo' => Yii::app()->request->requestUri
    );


$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'selectionChanged'=>
                  ZHtml::clickableRow('CheckIncome/view', 'join'),
        'dataProvider'=>new KArrayDataProvider(
                      $model->incomes),
                  'columns'=>$attributes,
                  )); 
?>


<?php 

    echo '<span class="span-11">';
echo CHTML::link(CHtml::encode("Add Check for " . $model->summary), 
                 array("CheckIncome/create",
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

    echo "</span><span class=\"span-9 last\">";
    $un = CheckIncome::underAssignedChecks(null);
    if(count($un) > 0){
        echo "Or pick from one of these checks:<br />";
    }
    foreach($un as $check){
        echo CHTML::link($check->summary,
                 array("Income/create",
                       'class_id' => $model->id,
                       'company_id' => $model->company_id,
                       'returnTo' => Yii::app()->request->requestUri));
        echo CHtml::encode(': '.Yii::app()->format->currency($check->unassigned) . ' available');
        echo '<br />';


    }
    echo "</span><br />";
?>

<div class="clear"></div>

