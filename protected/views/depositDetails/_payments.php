<div class="span-14">
     <?php 

     echo CHtml::beginForm();
echo "Add One Check: ";
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
$("#add_details").html( ui.item.label ); 
$("#add_status").html( "Click Add or return to add:  " ); 
$("input#CheckIncome_id").val( ui.item.value ); 
return false; }',
                      ),
                  ));
echo CHtml::hiddenField("CheckIncome[id]"); 
echo CHtml::hiddenField("CheckIncome[deposit_id]", $model->id); 
echo CHtml::ajaxSubmitButton('Add',
                             array('/CheckIncome/deposit'),
                             array('success'=>'js: function(data) {
          $( "#chuck_num_util" ).val( "" );
$("#add_status").html( "Added:  " ); 
$.fn.yiiGridView.update("check-income-grid");
                    }'));

echo CHtml::endForm();

?>

<div><span id="add_status"></span><span id="add_details"></span></div>

    </div>

    <div class="span-5">

    <?= CHTML::link("Auto-Populate Checks for deposit " . $model->summary, 
                    array("populateChecks",
                          'id' => $model->id,
                          'returnTo' => Yii::app()->request->requestUri)); ?>

</div>
<div class="clear"></div>

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
                      'id'=>'check-income-grid',
                      'dataProvider'=>new KArrayDataProvider(
                          $model->checks),
                      'summaryText' => 'Subtotal Checks: ' . 
                      Yii::app()->format->currency($model->subtotal_checks),

                      'selectionChanged'=>
                      ZHtml::clickableRow('CheckIncome/view', 'join'),

                      'columns'=>array(
                          'check_num:ntext:Check #',
                          'amount:currency:Check Amount',
                          'unassigned:currency:Discrepancy',
                          'payer:ntext:Payer',
                          'check_date:date:Check Date',
                          array(
                              'class'=>'CButtonColumn',
                              'template'=>'{my_button}',
                              'buttons'=>array(
                                  'my_button'=>array(
                                      'label'=>'Un-Deposit',
                                      'url'=> 
                                      'Yii::app()->controller->createUrl("/CheckIncome/undeposit", array("id" => $data->id))',
                                      'imageUrl'=>'',
                                      'options'=>array(
                                          'ajax'=>array(
                                              'type'=>'GET',
                                              'url'=>"js:$(this).attr('href')",
                                              'success'=>'js:function(data){
$.fn.yiiGridView.update("check-income-grid");}',
                                              ),
                                          ),
                                      ),
                                  ),
                              ),

                          ),
                      )); 
?>

