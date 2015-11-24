<?php

/**
 * This class loads the general functions for all application
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.1
 */
abstract class Master
{
    /**
     * Create an object to save the additional JavaScript file
     */
    public $js;

    /**
     * Create an object to save the additional CSS file
     */
    public $css;

    /**
     * 
     * @param type $class
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