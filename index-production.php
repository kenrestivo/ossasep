<?php

  // change the following paths if necessary
$yii=dirname(__FILE__).'/../protected/yii-framework/yii.php';
$glob=dirname(__FILE__).'/protected/globals.php';
$config=dirname(__FILE__).'/protected/config/production.php';

// remove the following lines when in production mode
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
                         
                         
require_once($yii);
require_once($glob);
Yii::createWebApplication($config)->run();


