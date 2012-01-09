<h1>Classes for <?= CHtml::encode($instructor->full_name) ?></h1>
<div></div>
<?php
foreach($instructor->classes as $class){
    $this->renderPartial(
        '/admin/_signup',
        array('model' => $class));
}

?>