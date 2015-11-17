<?php

/**
 * This class starts the Smary machine to be able in every class
 * 
 * @copyright KASalgado 2010 - 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class SmartyMachine
{
    /**
     * Execute the Smarty Framework
     * @return var $smartyInst
     */
    public function loadSmarty()
    {
        // Load the Smarty machine
        require_once APPLICATION_PATH . '/../library/Smarty/Smarty.class.php';
        $smarty = new Smarty();

        $smarty->template_dir = APPLICATION_PATH . '/views/templates';
        $smarty->compile_dir = APPLICATION_PATH . '/views/templates_c';
        $smarty->cache_dir = APPLICATION_PATH . '/views/cache';
        $smarty->config_dir = APPLICATION_PATH . '/views/configs';

        return $smarty;
    }

    /**
     * Set all variables to be used in the templates
     */
    public function setVariables(array $vars)
    {
        // Assign the variables into the Smarty machine
        require_once APPLICATION_PATH . '/../library/Smarty/Smarty.class.php';
        $smarty = new Smarty();
        foreach ($vars as $key => $value) {
            $smarty->assign($key, $value);
        }
    }
}
