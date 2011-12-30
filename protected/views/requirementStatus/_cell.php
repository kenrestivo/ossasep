<?php
$res="";
$class="";
if($model->missing){
    $class = "error";
    $res = "Missing";
} else if($model->expiring)  {
    $class = "warning";
    $res = 'Expiring ' . Yii::app()->format->date($model->expired);
} else if($model->expired)  {
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