<?php
   echo CHtml::form(); 
   echo CHtml::dropDownList('id', 
                            $saved, 
                            CHtml::listData($sessions, 'id','summary' ), 
                            array('submit' => '')) ;
   echo CHtml::endForm();
?>
