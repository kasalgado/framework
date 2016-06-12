<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.1
 */

/**
 * This class initializes the Smarty Machine Engine.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class SmartyMachine
{
    /**
     * Starts Smarty.
     * 
     * @return object \Smarty
     */
    public function loadSmarty()
    {
        require_once APPLICATION_PATH . '/../library/Smarty-2.6.28/Smarty.class.php';
        $smarty = new Smarty();

        $smarty->template_dir = APPLICATION_PATH . '/views/templates';
        $smarty->compile_dir = APPLICATION_PATH . '/views/templates_c';
        $smarty->cache_dir = APPLICATION_PATH . '/views/cache';
        $smarty->config_dir = APPLICATION_PATH . '/views/configs';

        return $smarty;
    }
}
