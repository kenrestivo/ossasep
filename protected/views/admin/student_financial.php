<ul>
<?php
foreach($models as $model){
    echo '<li><h3>' . $model->full_name . '</h3>';
    $this->renderPartial(
        '/signup/_class_summary',
        array('model' =>$model));

    echo '</li>';
}

?>
</ul>