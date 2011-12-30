<h1>Instructor Paperwork</h1>

<?php
foreach($instructors as $i){
    echo '<span class="span-4"><b>' . CHtml::encode($i->full_name) . '</b></span>';
    echo '<span class="span-16 last">';
    $this->renderPartial(
        '/instructor/_requirement_status',
        array('model' =>$i));
    echo '</span><div class="clear"></div>';
}

?>