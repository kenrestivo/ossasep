<?php
foreach($models as $model){
    echo '<h3>' . $model->full_name . '</h3>';

    $this->renderPartial(
        '/signup/_payment_summary',
        array('model' =>$model));


}

?>