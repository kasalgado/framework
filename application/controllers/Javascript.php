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
     * @param array $data
     * @return array
     */
    public function index($data = array())
    {
        return array(
            'name' => 'Kleber',
            'js_name' => 'KAS',
        );
    }
    
    public function ajax($data)
    {
        $result = array('id' => $data['id'], 'string' => 'test....');
        
        return $result;
    }
}