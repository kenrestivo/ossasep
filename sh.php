<?php

  /* Config file hack for use with phpsh
   */

defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once('/usr/local/yii-framework/yii.php');

/* This is lifted verbatim
   from  /mnt/s/usr/local/yii-framework/cli/commands/ShellCommand 
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @version $Id: ShellCommand.php 2799 2011-01-01 19:31:13Z qiang.xue $

 */

$entryScript='index.php';
if(!is_file($entryScript))
    $this->usageError("{$args[0]} does not exist or is not an entry script file.");

                                                
// fake the web server setting
$cwd=getcwd();
chdir(dirname($entryScript));
$_SERVER['SCRIPT_NAME']='/'.basename($entryScript);
$_SERVER['REQUEST_URI']=$_SERVER['SCRIPT_NAME'];
$_SERVER['SCRIPT_FILENAME']=$entryScript;
$_SERVER['HTTP_HOST']='localhost';
$_SERVER['SERVER_NAME']='localhost';
$_SERVER['SERVER_PORT']=80;

// reset context to run the web application
restore_error_handler();
restore_exception_handler();
Yii::setApplication(null);
Yii::setPathOfAlias('application',null);

ob_start();
$config=require($entryScript);
ob_end_clean();

// oops, the entry script turns out to be a config file
if(is_array($config))
{
    chdir($cwd);
    $_SERVER['SCRIPT_NAME']='/index.php';
    $_SERVER['REQUEST_URI']=$_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_FILENAME']=$cwd.DIRECTORY_SEPARATOR.'index.php';
    Yii::createWebApplication($config);
}

restore_error_handler();
restore_exception_handler();

$yiiVersion=Yii::getVersion();

//Yii::createConsoleApplication($config);
