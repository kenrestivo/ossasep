
<?php
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructor-grid',
                 /* NOTE! this can't be ajax because the view above
                     won't update and will be out of sync.
                     I guess I could trigger that one to update, but that'd
                     be stupid, just update the whole page instead.
                   */
                  'ajaxUpdate' => false,
                   'dataProvider'=>new KArrayDataProvider(
                       $model->instructors),
                  'selectionChanged'=>ZHtml::clickableRow('Instructor/view'),
                  'columns'=>array(
                      'full_name:text:Instructor',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'Instructor',
                          'template'=>'{view}{delete}',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>


<?php

     echo CHTML::link(CHtml::encode("Add New Instructor"), 
                 array("Instructor/create",
                       'company_id' => $model->id,
                       'returnTo' => Yii::app()->request->requestUri));

?>