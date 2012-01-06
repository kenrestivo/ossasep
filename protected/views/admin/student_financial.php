<ul>
<?php
foreach($models as $model){
    echo '<li><h2>' . $model->full_name . '</h2>';
    $this->renderPartial(
        '/signup/_class_summary',
        array('model' =>$model));

    echo '</li>';
}

?>
</ul>