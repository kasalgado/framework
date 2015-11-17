<?php

/**
 * The class Init sets initial configuration up for application
 * 
 * @copyright KASalgado 2011 - 2015
 * @author Kleber Salgado
 * @version 1.0
 */
class Init
{
    const DEFAULT_LANG = 'es';
    
    /**
     * Set config variables for the application
     */
    public function setup()
    {
        $xml = new XMLImport();
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
     * 
     */
    public function setLang()
    {
        $session = new Session();
        $vars = new Vars();
        
        $session->set('lang', $vars->get('lang') ? $vars->get('lang') : self::DEFAULT_LANG);
    }
}
