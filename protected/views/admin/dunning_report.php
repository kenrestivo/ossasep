<h1>Dunning Report for <?= CHtml::encode(ClassSession::current()->summary) ?></h1>
<?php


$dp = new KArrayDataProvider(
                      $results,
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
                      'student.summary:text:Student',
                      'class.summary:text:Class',
                      array('name' => 'Owed',
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
                          'template'=>'{update}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

