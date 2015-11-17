<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class Mysql extends Master
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
     * @param array $data
     * @return array
     */
    public function index()
    {
        return array();
    }
}