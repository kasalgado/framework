<?php

/**
 * This class manages the index page in the application
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.2
 */
class Javascript extends Master
{
    /**
     * Load the necessary resources for this page
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
            'name' => 'Kleber',
            'js' => array(
                'basename' => APPLICATION_BASENAME . '?ctr=ajaxCommander',
                'js_name' => 'KAS',
            ),
            'nav_javascript' => true,
        );
    }
    
    public function ajax($data)
    {
        $result = array('id' => $data['id'], 'string' => 'test....');
        
        return $result;
    }
}