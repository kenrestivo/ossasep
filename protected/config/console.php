<?php

  // This is the configuration for yiic console application.
  // Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'asep',
	// application components
	'components'=>array(
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=asep',
			'emulatePrepare' => true,
			'username' => 'asep',
			'password' => 'students',
			'charset' => 'utf8',
		),
        )
);