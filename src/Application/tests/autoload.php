<?php

spl_autoload_register(function($class) {
    $application_path = realpath(dirname(__FILE__) . '/../../../src/Application');
    $lib_path = realpath(dirname(__FILE__) . '/../../../Library/Lib');
    $utils_path = realpath(dirname(__FILE__) . '/../../../Library/Utils');
    
    require_once $application_path . '/Controllers/Master.php';
    require_once $application_path . '/Controllers/Start.php';
    require_once $application_path . '/Controllers/Javascript.php';
    require_once $utils_path . '/App/FileVersion.php';
    require_once $lib_path . '/LoadResources.php';
}, true, false);