<?php
echo CHtml::form(); 
echo CHtml::dropDownList('ClassSession[id]', 
                         $saved, 
                         CHtml::listData($sessions, 'id','summary' ), 
                         array('submit' => '',
                             )) ;

echo '&nbsp;';
echo CHtml::submitButton('Change'); 

echo CHtml::endForm();
?>
