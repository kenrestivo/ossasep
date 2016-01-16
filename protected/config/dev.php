<?php

define('YII_DEBUG',true);

/// A terrible hack, this really needs to be in the db, and in a proper RBAC. But this'll do for nowe
require_once('passwords.php');

if ($ASEP_ADMIN_PASS == ""){
    throw new CException("empty passwords file or no passwords file");
}



// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'OSSASEP SANDBOX (DEVELOPMENT SERVER)',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
        /*
          'gii'=>array(
          'class'=>'system.gii.GiiModule',
          'password'=>'thetest',
          // If removed, Gii defaults to localhost only. Edit carefully to taste.
          'ipFilters'=>array('*'),
          ),
        */
	),

	// application components
	'components'=>array(
        'format'=>array(
            'class'=>'KFormatter',
        ),
		'user'=>array(
		),
        'assetManager'=>array(
            'class'=>'application.extensions.SafeModeAssetManager',
        ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to use a MySQL database
	
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=asep',
			'emulatePrepare' => true,
			'username' => 'asep',
			'password' => 'students',
			'charset' => 'utf8',
            'enableParamLogging' => true,
		),
	
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, debug,trace',
				),
				// uncomment the following to show log messages on web pages
				array(
					'class'=>'CWebLogRoute',
					'enabled' => YII_DEBUG,
				),
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'krestivo@restivo.org',
        'defaultNumMeetings'=> 8,
        'timezone' => 'America/Los_Angeles',
        'backup_url' => '/cgi/backup-dev.cgi',
        'admin_pass' => $ASEP_ADMIN_PASS,
        'parent_pass' => $ASEP_PARENT_PASS,
        'office_pass' => $ASEP_OFFICE_PASS,
        'instructor_pass' => $ASEP_INSTRUCTOR_PASS,
	),
);


