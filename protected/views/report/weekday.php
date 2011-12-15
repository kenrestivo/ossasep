<h1>Schedule of classes</h1>
<?php
    $this->renderPartial(
        '_schedule',
        array('classes' => $classes,
            'days' => $days));

?>