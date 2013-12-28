<h2>Choose Language:</h2>
<?php
 // TODO: put this in some kind o div to look like a dialog box
echo CHtml::form(); 
echo CHtml::dropDownList('Language[id]', 
                         $saved, 
                         CHtml::listData($languages, 'id','description' ), 
                         array('submit' => '',
                             )) ;

echo '&nbsp;';
echo CHtml::submitButton('Change'); 

echo CHtml::endForm();
?>
