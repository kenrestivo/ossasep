<?php

function trace($stuff){
    Yii::trace(CVarDumper::dumpAsString($stuff),'vardump');
  }

?>