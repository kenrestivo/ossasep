<?php
$res="";
$class="";
if($model->is_missing){
    $class = "error";
    $res = "Missing";
} else if($model->is_expiring)  {
    $class = "warning";
    $res = 'Expiring ' . Yii::app()->format->date($model->expired);
} else if($model->is_expired)  {
    $class = "error";
    $res = "Expired " . Yii::app()->format->date($model->expired);;
} else {
    $res = "OK";
}
$res .= CHtml::encode($model->note);
?>

<td class="<?= $class ?>">
<?= $res ?>
</td>