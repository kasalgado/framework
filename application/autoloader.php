<?php

/**
 * Call magic function autoload
 * 
 * @param string $className
 */
function __autoload($className)
{
    require_once $className . '.php';
}
