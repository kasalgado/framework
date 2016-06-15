<?php

require 'autoloader.php';

use Lib\Init;
use Lib\Loader;

/** Set initial configuration */
$init = new Init();
$init->setup();
$init->setLang();

/** Get loader for controller and template */
$loader = new Loader();
$loader->get();
