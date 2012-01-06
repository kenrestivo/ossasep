<ul>
<?php

foreach($model->signups as $signup){
    echo '<li><h3><span>' . CHtml::encode($signup->class->summary) . '</span>';
    echo '  <span>' . $signup->status . '</span>';
    $owed = $signup->class->costSummary - $signup->paid;
    echo '  <span>';
    if($owed != 0){
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