<?php

/**
 * This class manages the version of resource files for loading 
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.2
 */
class FileVersion
{
    /**
     * Object to manage CSS files
     */
    private $cssFiles = array(
        'start' => 0,
        'javascript' => 0,
        'mysql' => 0,
    );

    /**
     * Object to manage JS files
     */
    private $jsFiles = array(
        'start' => 0,
        'javascript' => 0,
        'mysql' => 0,
    );

    /**
     * Retrieve the names of the files in a bidimensional array
     * @return array $files
     */
    public function get($class)
    {
        return array(
            'css' => $this->cssFiles[$class],
            'js' => $this->jsFiles[$class],
        );
    }
}