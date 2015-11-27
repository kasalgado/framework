<?php

/**
 * 
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.2
 */
class FileVersion
{
    /**
     * Load css version for files
     */
    private $css = array(
        'start' => 0,
        'javascript' => 0,
        'mysql' => 0,
    );

    /**
     * Load js version for files
     */
    private $js = array(
        'start' => 0,
        'javascript' => 0,
        'mysql' => 0,
    );

    /**
     * 
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