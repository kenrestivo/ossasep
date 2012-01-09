<h1>Scholarship Report for <?= CHtml::encode(ClassSession::current()->summary) ?></h1>
<h2>CONFIDENTIAL</h2>
<?php


$dp = new KArrayDataProvider(
                      $model,
                      array('pagination' => false));

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>$dp,
                  'rowCssClassExpression' => 'ZHtml::rowHack($this, $data, $row)',
                  'selectionChanged'=> ZHtml::compositeClickableRow(
                      'Signup/update', 
                      array('student_id', 'class_id'), 
                      Yii::app()->request->requestUri),
                  'columns'=>array(
                      'student.full_name:text:Name',
                      'class.summary:text:Class',
                      array('name' => 'Cost',
                            'value' => '$data->class->costSummary',
                            'type' => 'currency',
                            'htmlOptions'=>array('style'=>'text-align: right'),
                            // how to make PHP look like javascript
                            'footerHtmlOptions'=>array('style'=>'text-align: right'),
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
                          'template'=>'{update}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

