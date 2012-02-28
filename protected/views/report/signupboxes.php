<h1>Signup Form (checkboxes)</h1>

<?php 
foreach($classes as $class_split){
    $this->renderPartial(
        '_checkbox_table',
        array('classes' => $class_split));
}

?>
