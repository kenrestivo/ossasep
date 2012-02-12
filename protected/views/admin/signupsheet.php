<h1>Signup Sheet - Front Office - for <?= CHtml::encode(ClassSession::current()->summary) ?></h1>
<?php
foreach($classes as $class){
    $this->renderPartial(
        '/admin/_signup',
        array('model' => $class));
}

?>