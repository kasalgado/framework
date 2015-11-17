<?php

// Define application enviroment
defined('APPLICATION_ENVIRONMENT') || define('APPLICATION_ENVIRONMENT', 'development');

// Define absolute application path
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define absolute framework path
defined('FRAMEWORK_PATH') || define('FRAMEWORK_PATH', realpath(dirname(__FILE__) . '/../library/lib'));

// Define absolute application path
defined('MODELS_PATH') || define('MODELS_PATH', realpath(dirname(__FILE__) . '/../application/models'));

// Add framework and application paths to the PHP path environment
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH),
    realpath(FRAMEWORK_PATH),
    realpath(MODELS_PATH),
    get_include_path(),
)));

require_once 'autoloader.php';

// Set initial configuration
$init = new Init();
$init->setup();

if (count($argv) == 1) {
    echo "You must enter a parameter!\n";
} else {
    switch ($argv[1]) {
        case 'schema:create':
            $db = MySqlRunQuery::getInstance();
            $query = Create::Run();
            $db->run($query);
            echo "Database schema was created successfully!\n";
            break;
        
        case 'schema:update':
            $db = MySqlRunQuery::getInstance();
            $query = Update::Users();
            $db->run($query);
            echo "Database schema was created successfully!\n";
            break;

        default:
            echo "Please give one of the permit parameters!\n";
    }
}