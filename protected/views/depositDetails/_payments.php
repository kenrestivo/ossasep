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
   return false;
  }',
                      'select'=>'js:function( event, ui ) {
$("input#CheckIncome_id").val( ui.item.value ); 
return false; }',
                      ),
                  ));
echo CHtml::hiddenField("CheckIncome[id]"); 
echo CHtml::ajaxSubmitButton('Add',
                             CHtml::normalizeUrl(
                                 array('addcheck',
                                       'id'=>$model->id)),
                             array('success'=>'js: function(data) {
          $( "#chuck_num_util" ).val( "" );
$.fn.yiiGridView.update("check-income-grid");
                    }'));

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

