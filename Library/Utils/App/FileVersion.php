<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */

namespace Utils\App;

/**
 * The class FileVersion assigns file version of css and js files for their
 * use in application.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class FileVersion
{
    /**
     * Loads css version for files
     */
    private $css = array(
        'start' => 0,
        'javascript' => 0,
        'mysql' => 0,
    );

    /**
     * Loads js version for files
     */
    private $js = array(
        'start' => 0,
        'javascript' => 0,
        'mysql' => 0,
    );

    /**
     * Returns files version as array.
     * 
     * @return array
     */
    public function get($class)
    {
        return array(
            'css' => $this->css[$class],
            'js' => $this->js[$class],
        );
    }
}