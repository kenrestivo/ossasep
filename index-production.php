<?php

  // change the following paths if necessary
$yii=$_SERVER['NFSN_SITE_ROOT'].'/protected/yii-framework/yii.php';
$glob=dirname(__FILE__).'/protected/globals.php';
$config=dirname(__FILE__).'/protected/config/production.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
                         
                         
require_once($yii);
require_once($glob);
Yii::createWebApplication($config)->run();


