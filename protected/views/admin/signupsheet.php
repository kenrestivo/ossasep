<h1>Signup Sheet - Front Office</h1>
<?php
foreach($classes as $class){
    $this->renderPartial(
        '_signup',
        array('model' => $class));
}

?>