<h1>Signup Sheet</h1>
<?php
foreach($classes as $class){
    $this->renderPartial(
        '_signup_public',
        array('model' => $class));
}

?>