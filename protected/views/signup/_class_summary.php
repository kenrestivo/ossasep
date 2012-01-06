<ul>
<?php

foreach($model->signups as $signup){
    echo '<li><span>' . $signup->class->summary . '</span>';
    echo '<span>' . $signup->status . '</span>';
    echo '<p>' . $signup->note . '</p>';
    echo '</li>';
}

?>

</ul>