<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	$model->id,
    );

?>
<h1>Class Details <?php echo $model->class_name; ?></h1>

<?php
$this->widget('CTabView',array(
    'activeTab'=>'tab2',
    'tabs'=>array(
        'tab1'=>array(
            'title'=>'Overview',
            'view' =>'_overview',
            'data' => array('model' => $model)
        ),
        'tab2'=>array(
            'title'=>'Students',
            'view' =>'_students',
            'data' => array('model' => $model)
        ),
        'tab3'=>array(
            'title'=>'Url tab',
            'url'=>Yii::app()->createUrl("site/index"),
        )
    ),
));

?>





<h3>Instructors</h3>
<?php 
echo CHTML::link("Add Instructor to Class", 
                 array("InstructorAssignment/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'instructorassignment-grid',
                  'dataProvider'=>new KArrayDataProvider(
                      $model->instructor_assignments, 
                      array('keyField' => 'class_id,instructor_id',
                          )),
                  'columns'=>array(
                      array('name' => "Name",
                            'value' => '$data->instructor->full_name'),
                      'percentage',
                      array(
                          'class'=>'CompositeButtonColumn',
                          'modelClassName' => 'InstructorAssignment',
                          'returnTo' => Yii::app()->request->requestUri
                          ),
                      ),
                  )); ?>



<h3>Extra Fees</h3>
<?php 
echo CHTML::link("Add Extra Fee to Class", 
                 array("ExtraFee/create",
                       'returnTo' => Yii::app()->request->requestUri));
$this->widget('zii.widgets.grid.CGridView', array(
                  'id'=>'extrafees-grid',
                  'dataProvider'=>new CArrayDataProvider(
                      $model->extra_fees),
                  'columns'=>array(
                      'description',
                      'amount',
                      array(
                          'class'=>'CButtonColumn'
                          ),
                      ),
                  )); ?>


