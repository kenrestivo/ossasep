<ul>
<?php

foreach($model->signups as $signup){
    echo '<li><h3><span class="span-10">' . CHtml::encode($signup->class->summary) . '</span>';
    echo '  <span class="span-4">' . $signup->status . '</span>';
    $owed = $signup->owed;
    echo '  <span class="span-3 last">';
    if($signup->scholarship >0){
        echo "Scholarship";
    } else if($owed != 0){
        echo Yii::app()->format->currency($owed). ' owed';
    }
    echo '</span>';
    echo '</h3>';
    echo '<p>' . CHtml::encode($signup->note) . '</p>';

    $this->renderPartial(
        '/signup/_payment_summary',
        array('model' =>$signup));

    echo '</li>';
}

?>

</ul>