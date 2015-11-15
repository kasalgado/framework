<?php

/**
 * This class administrates urls in the application
 * 
 * @copyright KASalgado 2011 - 2012
 * @author Kleber Salgado
 * @version 1.2
 */
class URLs
{
    public function createURL($components)
    {
        $url = $this->getServer() . '/' . APPLICATION_BASENAME . '?' . $components;

        return $url;
    }

    public function getServer()
    {
        $name = $_SERVER['SERVER_NAME'];

        return $name;
    }
}
