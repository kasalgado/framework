<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define absolute application path
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

require(APPLICATION_PATH . '/../library/Smarty/Smarty.class.php');
$smarty = new Smarty();

echo APPLICATION_PATH . '/views/templates';
$smarty->setTemplateDir(APPLICATION_PATH . '/views/templates');
$smarty->setCompileDir(APPLICATION_PATH . '/views/templates_c');
$smarty->setCacheDir(APPLICATION_PATH . '/views/cache');
$smarty->setConfigDir(APPLICATION_PATH . '/views/configs');
$smarty->testInstall();
$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');