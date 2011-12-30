<h1>Instructor Paperwork</h1>

<?php
foreach($instructors as $i){
    echo '<span class="span-4"><b>' ;

    if(Yii::app()->user->name != 'admin' ){
        echo CHtml::encode($i->full_name);
    } else {
        echo CHtml::link(CHtml::encode($i->full_name), array('/Instructor/view', 'id'=>$i->id)); 
    }
    echo '</b></span>';
    echo '<span class="span-16 last">';
    $this->renderPartial(
        '/instructor/_requirement_status',
        array('model' =>$i));
    echo '</span><div class="clear"></div>';
}

?>