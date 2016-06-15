<?php

namespace Application\Controllers;

/**
 * This class shows how can JavaScript be implemented in an application.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */
class Javascript extends Master
{
    /**
     * Loads resources
     */
    public function __construct()
    {
        $this->loadResources('javascript');
    }

    /**
     * Assigns variables to be used in Template. The js variable assigns
     * variables to be used direct in .js files.
     * 
     * @return array
     */
    public function index()
    {
        return array(
            'js' => array(
                'basename' => APPLICATION_BASENAME . '?ctr=ajaxCommander',
                'js_name' => 'KAS',
            ),
            'nav_javascript' => true,
        );
    }
    
    /**
     * Assigns variables to be used as json format.
     * 
     * @param array $data
     * @return array $vars
     */
    public function json($data)
    {
        $vars = array(
            'name' => $data['name'],
        );
        
        return $vars;
    }
    
    /**
     * Assigns variables to be used in template.
     * 
     * @param array $data
     * @return array $vars
     */
    public function html($data)
    {
        $vars = array(
            'name' => $data['name'],
        );
        
        return $vars;
    }
}