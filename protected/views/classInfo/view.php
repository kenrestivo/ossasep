<?php
$this->breadcrumbs=array(
	'Class Infos'=>array('index'),
	$model->id,
    );

?>
<h1><?php echo $model->class_name; ?></h1>

<?php
$this->widget('CTabView',array(
    'activeTab'=>'tab1',
    'tabs'=>array(
        'tab1'=>array(
            'title'=>'Overview',
            'view' =>'_overview',
            'data' => array('model' => $model)
        ),
        'tab2'=>array(
            'title'=>'Students',
            'view' =>'_students',
            'data' => array('model' => $model),
        ),
        'tab3'=>array(
            'title'=>'Instructors',
            'view' =>'_instructors',
            'data' => array('model' => $model),
        ),
        'tab3'=>array(
            'title'=>'Instructors',
            'view' =>'_instructors',
            'data' => array('model' => $model),
        ),
    ),
));

?>







