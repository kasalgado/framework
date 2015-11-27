<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.1
 */
class SmartyMachine
{
    /**
     * 
     * 
     * @return \Smarty
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
