<?php
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

$my_include_folder = realpath(dirname(__FILE__)).'/library';
set_include_path(get_include_path() . PATH_SEPARATOR . $my_include_folder);

// Debug - Desativar quando em prod
//defined('YII_DEBUG') or define('YII_DEBUG',true);
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
