<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
            
// Define application enviroment
defined('APPLICATION_ENVIRONMENT') || define('APPLICATION_ENVIRONMENT', 'development');

// Define application basename
defined('APPLICATION_BASENAME') || define('APPLICATION_BASENAME', basename($_SERVER['PHP_SELF']));

// Define absolute application path
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../src/Application'));

// Define absolute framework path
defined('UTILS_PATH') || define('UTILS_PATH', realpath(dirname(__FILE__) . '/../Library/Utils'));

// Add framework and application paths to the PHP path environment
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH),
    realpath(UTILS_PATH),
    get_include_path(),
)));

// Call the configuration file environment
require_once APPLICATION_PATH . '/config.php';
