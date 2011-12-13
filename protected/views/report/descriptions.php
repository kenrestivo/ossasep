<?php
foreach($classes as $class){
    $this->renderPartial(
        '/classInfo/_description',
        array('model' => $class));
}

?>