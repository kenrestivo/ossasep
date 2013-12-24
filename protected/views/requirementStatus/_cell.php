<?php

// $model in this case is a requirementstatus
// $class is CSS class, for highlighting

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
        $res = CHtml::encode("OK " . ($model->expired > 0 ? "til " : "") . Yii::app()->format->date($model->expired));
    } else {
        $res = "OK";
    }
}
// NOTE! the note is only for admin to see
if(isset($model) && $model->note != '' && Yii::app()->user->name == 'admin'){
    $res .= '<br />' . CHtml::encode($model->note);
}
?>

<td class="<?= $class ?>">
<?= $res ?>
</td>