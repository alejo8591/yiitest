<?php
/**
 * This is the bootstrap file for test application.
 * This file should be removed when the application is deployed for production.
 */

// change the following paths if necessary
$yii='/Applications/MAMP/htdocs/yiitest/yii/framework/yii.php';
$config='/Applications/MAMP/htdocs/yiitest/demo/protected/config/test.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();