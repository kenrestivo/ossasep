<h3>Choose class to copy to current session from previous session</h3>

<?php
   echo CHtml::form(); 
   echo CHtml::dropDownList(
       'ClassInfo[id]', 
       '',
       // NOTE: this really is findall, up until such time as there's a dropdown
       CHtml::listData(ClassInfo::model()->findAll(
                           'session_id = :sid',
                           array('sid' => $fromsession->id)), 
                       'id', 'summary'),
       array('submit' => '')) ;
   echo CHtml::endForm();
?>
