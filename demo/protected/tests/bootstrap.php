<?php

// change the following paths if necessary
// $yiit=dirname(__FILE__).'/Applications/MAMP/htdocs/yiitest/yii/framework/yiit.php';
// $config=dirname(__FILE__).'/Applications/MAMP/htdocs/yiitest/demo/protected/config/test.php';

	$yiit='/Applications/MAMP/htdocs/yiitest/yii/framework/yiit.php';
	$config='/Applications/MAMP/htdocs/yiitest/demo/protected/config/test.php';


require_once($yiit);
require_once('/Applications/MAMP/htdocs/yiitest/demo/protected/tests/WebTestCase.php');

Yii::createWebApplication($config);
