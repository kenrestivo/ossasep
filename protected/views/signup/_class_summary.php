<ul>
<?php

foreach($model->signups as $signup){
    echo '<li><span>' . $signup->class->summary . '</span>';
    echo '<span>' . $signup->status . '</span>';
    echo '<p>' . $signup->note . '</p>';

    $this->renderPartial(
        '/signup/_payment_summary',
        array('model' =>$signup));

    echo '</li>';
}

?>

</ul>