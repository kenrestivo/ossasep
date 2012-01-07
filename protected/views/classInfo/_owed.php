<?php 

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->sortedSignups),
                  'rowCssClassExpression' => 'ZHtml::rowHack($this, $data, $row)',
                  'selectionChanged'=> ZHtml::compositeClickableRow(
                      'Signup/update', 
                      array('student_id', 'class_id'), 
                      Yii::app()->request->requestUri),
                  'summaryText' => $model->summaryCounts,
                  'columns'=>array(
                      'student.full_name:text:Name',
                      'student.grade:grade:Grade',
                      'status:text:Status',
                      'owed:currency:Owed',
                      'note:ntext:Note',
                      ),
                  )); ?>

