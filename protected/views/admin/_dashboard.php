<?php 

$dp = new KArrayDataProvider(
    $classes,
    array('pagination' => false));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>$id,
                  'htmlOptions'=>array('style'=>'cursor: pointer;'),
                  'selectionChanged'=>ZHtml::clickableRow('ClassInfo/view'),
                  'summaryText' => '',
                  'dataProvider'=> $dp,
                  'columns'=>array(
                      'summary:ntext:Class',
                      'signup_status:text:Status',
                      'enrolled_count:nozero:Signed up',
                      'waitlist_count:nozero:Waitlisted',
                      array('name' => 'Scholarships',
                            'value' => '$data->scholarships_count',
                            'type'=>'nozero',
                            'htmlOptions'=>array('style'=>'text-align: right'),
                            'footerHtmlOptions'=>array('style'=>'text-align: right'),                            
                            'footer'=>
                            Yii::app()->format->nozero($dp->columnTotal('scholarships_count')),
                          ),
                      array(
                          'name'=>'Paid By Students',
                          'value'=>'$data->paid',
                          'type'=>'currency',
                          'htmlOptions'=>array('style'=>'text-align: right'),
                          'footerHtmlOptions'=>array('style'=>'text-align: right'),                          
                          'footer'=>
                          Yii::app()->format->currency($dp->columnTotal('paid')),
                          ),
                      array(
                          'name'=>'Owed From Students',
                          'value'=>'$data->owed',
                          'type'=>'currency',
                          'htmlOptions'=>array('style'=>'text-align: right'),
                          'footerHtmlOptions'=>array('style'=>'text-align: right'),
                          'footer'=>
                          Yii::app()->format->currency($dp->columnTotal('owed')),
                          ),
                      array(
                          'name'=>'Returned Payments',
                          'value'=>'$data->returned',
                          'type'=>'currency',
                          'htmlOptions'=>array('style'=>'text-align: right'),
                          'footer'=>
                          Yii::app()->format->currency($dp->columnTotal('returned')),
                          ),
                      'note:text:Admin Note'
                      ),
                  )); 
?>

