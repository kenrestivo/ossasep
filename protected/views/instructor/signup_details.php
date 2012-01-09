<h1>Enrollment for <?= CHtml::encode($instructor->full_name) ?> Classes</h1>
<?php
foreach($instructor->classes as $class){
    $this->renderPartial(
        '/admin/_signup',
        array('model' => $class));
}

?>