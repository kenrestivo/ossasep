<?php
   echo CHtml::form(); 
   echo CHtml::dropDownList(
       'ClassInfo[id]', 
       '',
       // NOTE: this really is findall, up until such time as there's a dropdown
       CHtml::listData(ClassInfo::model()->findAll(), 'id', 'summary'),
       array('submit' => '')) ;
   echo CHtml::endForm();
?>
