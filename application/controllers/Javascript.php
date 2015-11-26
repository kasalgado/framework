<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class Javascript extends Master
{
    /**
     * Load resources
     */
    public function __construct()
    {
        $this->loadResources('javascript');
    }

    /**
     * 
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
     * 
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
     * 
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