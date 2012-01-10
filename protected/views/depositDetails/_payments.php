label <div id="labelfoc"> </div> value<div id="idfoc"></div>


<?php 


echo CHTML::link("Auto-Populate Checks for " . $model->summary, 
                 array("populateChecks",
                       'id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));


echo CHtml::beginForm(array('addcheck', 'id' => $model->id));
echo "Add Check";
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                  'name'=>'chuck_num_util',
                  'source'=>Yii::app()->controller->createUrl("/CheckIncome/checknumac"),
                  // additional javascript options for the autocomplete plugin
                  'options'=>array(
                      'minLength'=>'2',
/// needed so that the id doesn't populate the select box
                      'focus'=>'js:function( event, ui ) {
          $( "#chuck_num_util" ).val( ui.item.label );
$("#labelfoc").html( ui.item.label );
$("#idfoc").html( ui.item.value ); 
   return false;
  }',
                      'select'=>'js:function( event, ui ) {
$("#labelhere").html( ui.item.label );
$("#idhere").html( ui.item.value ); 
return false; }',
                      ),
                  ));
echo CHtml::submitButton('Add');
echo CHtml::endForm();

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'check-income-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->checks),
                  'summaryText' => 'Subtotal Checks: ' . Yii::app()->format->currency($model->subtotal_checks),

                  'selectionChanged'=>
                  ZHtml::clickableRow('CheckIncome/view', 'join'),

                  'columns'=>array(
                      'check_num:ntext:Check #',
                      'amount:currency:Check Amount',
                      'payer:ntext:Payer',
                      'check_date:date:Check Date',
                      'unassigned:currency:Un-Assigned',
                      ),
                  )); 
?>

label <div id="labelhere"> </div> value<div id="idhere"></div>

