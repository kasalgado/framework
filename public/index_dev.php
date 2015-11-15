<?php

// Define application enviroment
defined('APPLICATION_ENVIRONMENT') || define('APPLICATION_ENVIRONMENT', 'development');

// Define application basename
defined('APPLICATION_BASENAME') || define('APPLICATION_BASENAME', basename($_SERVER['PHP_SELF']));

// Define absolute application path
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define absolute application path
defined('CONTROLLERS_PATH') || define('CONTROLLERS_PATH', realpath(dirname(__FILE__) . '/../application/controllers'));

// Define absolute framework path
defined('FRAMEWORK_PATH') || define('FRAMEWORK_PATH', realpath(dirname(__FILE__) . '/../library/lib'));

// Define absolute framework path
defined('UTILS_PATH') || define('UTILS_PATH', realpath(dirname(__FILE__) . '/../application/utils/app'));

// Add framework and application paths to the PHP path environment
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH),
    realpath(CONTROLLERS_PATH),
    realpath(FRAMEWORK_PATH),
    realpath(UTILS_PATH),
    get_include_path(),
)));

// Call the configuration file environment
require_once APPLICATION_PATH . '/config.php';
