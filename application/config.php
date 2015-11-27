<?php

/**
 * 
 */

require 'autoloader.php';

// Set initial configuration
$init = new Init();
$init->setup();
$init->setLang();

// Get loader for controller and template
$loader = new Loader();
$loader->get();
