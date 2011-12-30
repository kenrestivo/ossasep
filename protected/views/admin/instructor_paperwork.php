<h1>Instructor Paperwork</h1>

<?php
foreach($instructors as $i){
    echo '<h3>' . CHtml::encode($i->full_name) . '</h3>';

    $this->renderPartial(
        '/instructor/_requirement_status',
        array('model' =>$i));
}

?>