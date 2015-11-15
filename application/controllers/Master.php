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
     * Create a DB connection object
     */
    protected $model;

    /**
     * Create an object to save the additional JavaScript file
     */
    public $jsFile;

    /**
     * Create an object to save the additional CSS file
     */
    public $cssFile;

    /**
     * Create an object to load the file version class
     */
    protected $fileVersion;

    /**
     * Create an object to load the utils class
     */
    protected $utils;
    
    /**
     * Create an object to load smarty class
     */
    protected $smarty;

    /**
     * 
     * @param type $class
     */
    protected function loadResources($class)
    {
        $fileVersion = new FileVersion();
        $files = $fileVersion->get($class);
        
        if ($files) {
            $resources = new LoadResourceFiles();
            $this->jsFile = $resources->loadJsFile($class, $files['js']);
            $this->cssFile = $resources->loadCssFile($class, $files['css']);
        }
    }
}