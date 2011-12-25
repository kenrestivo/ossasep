<h1>Schedule of classes</h1>
<?php
 /*
   This is nested stupidly like this because I will probbaly want to put tthat _schedule inside of something else sometime, like a proper signup packet, or put it directly on the homepage, etc etc
  */

    $this->renderPartial(
        '_schedule',
        array('classes' => $classes,
            'days' => $days));

?>