<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
date_default_timezone_set('UTC');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Planeaciones',
	'language'=>'es',
	'sourceLanguage'=>'es',
	

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.bootstrap-theme.widgets.*',
    	'ext.bootstrap-theme.helpers.*',
    	'ext.bootstrap-theme.behaviors.*',
    	'ext.KEmail.KEmail',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Enter Your Password Here',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		*/
		'gii'=>array(
		      'class'=>'system.gii.GiiModule',
		      'password'=>'123qwe',
		      // If removed, Gii defaults to localhost only. Edit carefully to taste.
		      'ipFilters'=>array('*'),
		      'generatorPaths'=>array('ext.bootstrap-theme.gii',),
		    ),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'email'=>array(
			'class'=>'KEmail',
			'host_name'=>'smtp.gmail.com',
			'user'=>'robot@uss.mx',
			'password'=>'Zamarripa83',
			'host_port'=>465,
			'ssl'=>'true',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=planpre',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'Pl1t1f0rm1',
			'charset' => 'utf8',
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
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
				array(
			            'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
			            'ipFilters'=>array('127.0.0.1'),
			        ),
			),
		),
	),
	
	'theme'=>'bootstrap',

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'btorres@uss.mx',
	),
);
