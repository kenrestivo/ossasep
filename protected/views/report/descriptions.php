<h1>Class Descriptions for <?= $this->savedSessionSummary() ?></h1>

<?php
foreach($classes as $class){
    $this->renderPartial(
        '/classInfo/_description',
        array('model' => $class));
}

?>