<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class Mysql extends Master
{
    /**
     *
     * 
     * @var object
     */
    private $db;
    
    /**
     * Load the necessary resources for this page
     */
    public function __construct()
    {
        $this->loadResources('mysql');
        $this->db = MySqlRunQuery::getInstance();
    }

    /**
     * 
     * 
     * @return array $data
     */
    public function index()
    {
        $query = "SELECT * FROM user WHERE email LIKE ?";
        $params = array('%test.de');
        $data = $this->db->run($query, $params, 'fetchAll');
        
        return array(
            'users' => $data,
            'js' => array(
                'url' => APPLICATION_BASENAME . '?ctr=mysqlAdd',
            ),
        );
    }
    
    public function add()
    {
        return array();
    }
}