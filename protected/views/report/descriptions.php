<?php
foreach($classes as $class){
    $this->renderPartial(
        '_description',
        array('model' => $class,
              'meetings' => $class->active_meetings,
              'daysoff' => $class->days_off));
}

?>