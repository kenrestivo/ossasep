<?php

  // change the following paths if necessary
$yii='/usr/local/yii-framework/yii.php';
$prod=dirname(__FILE__).'/protected/production.php';
                       
if(is_readable($prod)){
    require_once($prod);
}

$glob=dirname(__FILE__).'/protected/globals.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
                         
                         require_once($yii);
                         require_once($glob);
                         Yii::createWebApplication($config)->run();


