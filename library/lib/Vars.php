<?php

/**
 * 
 * 
 * @copyright KASalgado 2011 - 2015
 * @author Kleber Salgado
 * @version 1.0
 */
class Vars
{
    /**
     * 
     * @param type $name
     * @return type
     */
    public function get($name)
    {
        return isset($_GET[$name]) ? $_GET[$name] : false;
    }
    
    /**
     * 
     * @return type
     */
    public function isGet()
    {
        return $_GET ? $_GET : false;
    }
    
    /**
     * 
     * @param type $name
     * @return type
     */
    public function post($name)
    {
        return isset($_POST[$name]) ? $_POST[$name] : false;
    }
    
    /**
     * 
     * @return type
     */
    public function isPost()
    {
        return $_POST ? $_POST : false;
    }
    
    /**
     * 
     * @param type $name
     * @return type
     */
    public function request($name)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : false;
    }
}
