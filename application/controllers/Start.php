<?php

/**
 * This class manages the index page in the application.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */
class Start extends Master
{
    /**
     * Loads the necessary resources for this page.
     */
    public function __construct()
    {
        $this->loadResources('start');
    }

    /**
     * Assigns variables for template.
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