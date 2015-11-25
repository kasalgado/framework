<?php

/**
 * This class manages the index page in the application
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.2
 */
class Start extends Master
{
    /**
     * Load the necessary resources for this page
     */
    public function __construct()
    {
        $this->loadResources('start');
    }

    /**
     * 
     * 
     * @return array
     */
    public function index()
    {
        return array(
            'nav_start' => true,
        );
    }
}