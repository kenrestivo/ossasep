<ul>
<?php

foreach($model->signups as $signup){
    echo '<li><h3><span>' . $signup->class->summary . '</span>';
    echo '  <span>' . $signup->status . '</span></h3>';
    echo '<p>' . $signup->note . '</p>';

    $this->renderPartial(
        '/signup/_payment_summary',
        array('model' =>$signup));

    echo '</li>';
}

?>

</ul>