<span class="span-8" >

<?php 

echo CHTML::link("Add 1 Class for " . CHtml::encode($model->full_name), 
                 array("Signup/create",
                       'student_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

?>

</span>

<span class="span-9 last" >

<?
echo CHtml::beginForm(array('/Signup/createMulti', 'student_id' => $model->id));
    echo CHtml::submitButton('Add');
    echo CHtml::textField('count', 2, array('size' => 2));
echo " Classes";
    echo CHtml::endForm();
?>

</span>

<?php

$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'signup-grid',
                  'rowCssClassExpression' => 'ZHtml::rowHack($this, $data, $row)',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->signups
                      ),
                  'columns'=>array(
                      'class.summary:text:Class',
                      'status:text:Status',
                      'scholarship:boolean:Scholarship',
                      'signup_date:datetime:Signed Up On',
                      'note:ntext:Note',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Signup',
                          'template'=>'{update}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); 
?>
