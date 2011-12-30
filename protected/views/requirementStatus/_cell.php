<?php
$res="";
$class="";
if(!isset($model) || $model->is_missing){
    $class = "status-error";
    $res = "Missing";
} else if($model->is_expired)  {
    $class = "status-error";
    $res = "Expired " . Yii::app()->format->date($model->expired);;
} else if($model->is_expiring)  {
    $class = "status-warning";
    $res = 'Expiring ' . Yii::app()->format->date($model->expired);
} else {
    $class = "status-ok";
    if(isset($model->expired)){
        $res = CHtml::encode("OK - " . Yii::app()->format->date($model->expired));
    } else {
        $res = "OK";
    }
}
if(isset($model) && $model->note != ''){
    $res .= '<br />' . CHtml::encode($model->note);
}
?>

<td class="<?= $class ?>">
<?= $res ?>
</td>