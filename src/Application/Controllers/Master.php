<?php

namespace Application\Controllers;

use Utils\App\FileVersion;
use Lib\LoadResources;

/**
 * The Master class prepares the necessary resources which would be used
 * in the application.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 * @version 1.1
 */
abstract class Master
{
    /**
     * Loads the additional JavaScript file.
     * 
     * @var object
     */
    public $js;

    /**
     * Loads the additional CSS file.
     * 
     * @var object
     */
    public $css;

    /**
     * Loads resources.
     * 
     * @param string $class
     */
    protected function loadResources($class)
    {
        $fileVersion = new FileVersion();
        $version = $fileVersion->get($class);
        
        if ($version) {
            $resources = new LoadResources();
            $this->js = $resources->jsApp($class, $version['js']);
            $this->css = $resources->cssApp($class, $version['css']);
        }
    }
}