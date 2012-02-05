<?php

// for using yiic via a repl from emacs
ini_set('max_execution_time', 30000); //24 hours
ini_set('max_input_time', 30000); // 24 hours

// change the following paths if necessary
$yiic='/usr/local/yii-framework/yiic.php';
$config=dirname(__FILE__).'/config/console.php';

require_once($yiic);
