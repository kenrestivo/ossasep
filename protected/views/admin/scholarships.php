<h1>Scholarship Report for <?= CHtml::encode(ClassSession::current()->summary) ?></h1>
<h2>CONFIDENTIAL</h2>
<?php

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model,
                      array('pagination' => false)),
                  'rowCssClassExpression' => 'ZHtml::rowHack($this, $data, $row)',
                  'selectionChanged'=> ZHtml::compositeClickableRow(
                      'Signup/update', 
                      array('student_id', 'class_id'), 
                      Yii::app()->request->requestUri),
                  'columns'=>array(
                      'student.full_name:text:Name',
                      'class.summary:text:Class',
                      'class.costSummary:currency:Cost',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'template'=>'{update}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>

