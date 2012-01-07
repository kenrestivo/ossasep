<?php
$this->breadcrumbs=array(
	'Dunning Report'=>array('dunningreport'),
	'Dunning Report',
    );
?>

<h1>Accounts Receivable Dunning Report for <?= CHtml::encode(ClassSession::current()->summary) ?></h1>

<p>Note: Negative balance indicates checks not yet returned or refunds not yet issued.</p>                                      
<?php


$dp = new KArrayDataProvider(
    $results,
    array('pagination' => false));

// hack for calculating doubel lines
$lastStudent = "";

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>$dp,
                  'rowCssClassExpression' => 'ZHtml::rowHack($this, $data, $row)',
                  'selectionChanged'=>
                  ZHtml::clickableRow('Student/view', 'join'),
                  'columns'=>array(
                      array(
                          'header' => 'Student',
                          'name' => 'student_id',
                          'value' => 
                          function($data,$row)   

                          {
                              global $lastStudent; //import the global variable

                              if($lastStudent != $data->student_id)
                              {
                                  $lastStudent = $data->student_id;
                                  return $data->student->summary;
                              }
                              else
                                  return '';
                          } 
                          ), 

                      'class.summary:text:Class',
                      'status:text:Status',
                      array('name' => 'Amount Receivable',
                            'htmlOptions' => array(
                                'style'=> 'text-align: right;'),
                            'value' => '$data->owed',
                            'type' => 'currency',
                            // how to make PHP look like javascript
                            'footer' => 'TOTAL: ' .
                            Yii::app()->format->currency(
                                array_reduce(
                                    $dp->data, 
                                    function($i,$j){ 
                                        $i += $j->class->costSummary; 
                                        return $i;})),
                          ),
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'template'=>'{view}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

