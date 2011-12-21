<h3>Paid</h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->incomes, 
                      array('keyField' => 'student_id,check_id,class_id',
                          )),
                  'columns'=>array(
                      'class.class_name:text:Class',
                      'check.amount:currency:Total Check Amount',
                      'amount:currency:Split Check Amount Assigned',
                      'check.check_date:date:Check Date',
                      'check.payer:text:Payer',
                      'check.delivered:date:Delivered to Company',
                      'check.deposited:date:Deposited',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Income',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 

?>
<p></p>
<h3>Unpaid/owed</h3>
<table style="items">
<tr><th>Class</th><th>Owed To</th><th>Amount</th></tr>
<?php 
    $payees= array();
foreach($model->owed as $owed){
    echo '<tr><td>' . $owed['class']->class_name . "</td><td>". $owed['payee']->name . "</td><td>" . $owed['amount'] . "</td></tr>";
    $payees[$owed['payee']->id]= $owed['payee'];
}

foreach($payees as $p){
    echo CHTML::link("Add Check to ". $p->name . " for " . $model->full_name . '<br />', 
                 array("CheckIncome/multiEntry",
                       'student_id' => $model->id,
                       'company_id' => $p->id,
                       'returnTo' => Yii::app()->request->requestUri));


}

?>
</table>


