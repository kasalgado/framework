<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.1
 */

namespace Lib;

use Smarty;

/**
 * This class initializes the Smarty Machine Engine.
 * 
 * @copyright KASalgado 2011 - 2013
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
        $smarty = new Smarty();

        $smarty->template_dir = APPLICATION_PATH . '/views/templates';
        $smarty->compile_dir = APPLICATION_PATH . '/views/templates_c';
        $smarty->cache_dir = APPLICATION_PATH . '/views/cache';
        $smarty->config_dir = APPLICATION_PATH . '/views/configs';

        return $smarty;
    }
}
