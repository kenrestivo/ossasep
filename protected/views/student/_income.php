<?php 

foreach($model->signups as $s){
    $cs = $s->class->costSummary;
    $c = Yii::app()->db->createCommand(
        "select sum(amount) as paid from income where student_id = :sid and class_id = :cid");
    $r=$c->queryRow(true, 
                    array(
                        'sid' => $s->student_id,
                        'cid' => $s->class_id,
                        )); 
    $paid = $r['paid'];
    $owed  =  $cs - $paid;
    if($s->scholarship < 1 && $owed > 0){
        echo $s->class->class_name . " " . $owed . "<br />";
    }
}


echo CHTML::link("Add Check for " . $model->full_name, 
                 array("CheckIncome/create",
                       'student_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes, 
                      array('keyField' => 'student_id,check_id,class_id',
                          )),
                  'columns'=>array(
                      'class.class_name:text:Class',
                      'check.amount:number:Total Check Amount',
                      'amount:number:Split Check Amount Assigned',
                      'check.check_date:date:Check Date',
                      'check.payer:text:Payer',
                      'check.delivered:date:Delivered to Company',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>
