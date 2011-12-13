<?php
foreach($classes as $class){
    $this->renderPartial(
        '_description',
        array('model' => $class));
}

?>