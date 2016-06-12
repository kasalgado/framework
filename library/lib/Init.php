<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.0
 */

/**
 * The class Init sets initial configuration for application up.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class Init
{
    const DEFAULT_LANG = 'es';
    
    /**
     * Sets config variables for the application.
     */
    public function setup()
    {
        $xml = new XmlContent();
        $params = $xml->getContent('setup/config.xml');
        $setup = $params[APPLICATION_ENVIRONMENT];
        
        define('APPLICATION_SERVER', $setup['server']);
        define('APPLICATION_USERNAME', $setup['username']);
        define('APPLICATION_PASSWORD', $setup['password']);
        define('APPLICATION_MYSQL_DB', $setup['db']);

        if ($setup['errors'] != 0) {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
        }
    }
    
    /**
     * Sets initial language configuration for global use.
     */
    public function setLang()
    {
        $session = new Session();
        $vars = new Vars();
        
        $session->set('lang', $vars->get('lang') ? $vars->get('lang') : self::DEFAULT_LANG);
    }
}
