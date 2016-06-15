<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.0
 */

namespace Lib;

/**
 * This class intends to hide the common server variables to get data from
 * a server request.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class Vars
{
    /**
     * Gets data from a get request.
     * 
     * @param string $name
     * @return mixed
     */
    public function get($name)
    {
        return isset($_GET[$name]) ? $_GET[$name] : false;
    }
    
    /**
     * Checks if a get request was sent.
     * 
     * @return mixed
     */
    public function isGet()
    {
        return $_GET ? $_GET : false;
    }
    
    /**
     * Gets data from a post request.
     * 
     * @param string $name
     * @return mixed
     */
    public function post($name)
    {
        return isset($_POST[$name]) ? $_POST[$name] : false;
    }
    
    /**
     * Checks if a post request was sent.
     * 
     * @return mixed
     */
    public function isPost()
    {
        return $_POST ? $_POST : false;
    }
    
    /**
     * Gets data from a post or a get request.
     * 
     * @param string $name
     * @return mixed
     */
    public function request($name)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : false;
    }
}
