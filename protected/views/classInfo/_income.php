<?php 
echo CHTML::link(CHtml::encode("Add Check for " . $model->class_name), 
                 array("Income/create",
                       'class_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));


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
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes, 
                      array('keyField' => 'student_id,check_id,class_id',
                          )),
                  'columns'=>$attributes,
                  )); 
?>