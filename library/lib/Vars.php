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
    public function get($name)
    {
        return isset($_GET[$name]) ? $_GET[$name] : false;
    }
    
    public function isGet()
    {
        return $_GET ? $_GET : false;
    }
    
    public function post($name)
    {
        return isset($_POST[$name]) ? $_POST[$name] : false;
    }
    
    public function isPost()
    {
        return $_POST ? $_POST : false;
    }
    
    public function request($name)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : false;
    }
}
