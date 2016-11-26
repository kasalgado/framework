<?php

namespace Application\Controllers;

use Lib\Translation;
use Lib\MySQLQuery;
use Lib\Vars;
use Lib\FormValidate;
use Lib\Router;

/**
 * This class shows how to use some common functions to work with MySQL.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */
class Mysql extends Master
{
    /**
     * Prepares fields for form validation.
     * 
     * @var array
     */
    private $validate = array(
        'username' => 'text',
        'email' => 'email',
    );
    
    /**
     * Loads a MySQL instance.
     * 
     * @var object
     */
    private $db;
    
    /**
     * Loads a Languages instance.
     * 
     * @var object
     */
    private $lang;
    
    /**
     * Sets necessary instances for this class.
     */
    public function __construct()
    {
        $languages = new Translation();
        $this->lang = $languages->getFromFile('classes', 'mysql');
        $this->db = MySQLQuery::getInstance();
        $this->loadResources('mysql');
    }

    /**
     * Fetches all rows from user.
     * 
     * @return array
     */
    public function index()
    {
        $query = "SELECT * FROM user WHERE ?";
        $params = array(1);
        $data = $this->db->run($query, $params, 'fetchAll');
        
        return array(
            'users' => $data,
            'js' => array(
                'url' => APPLICATION_BASENAME . '?ctr=mysqlAdd',
            ),
            'nav_mysql' => true,
        );
    }
    
    /**
     * Adds a new user row.
     * 
     * @return array $result
     */
    public function add($data)
    {
        $result = array(
            'data' => $data,
            'select' => array(
                $this->lang->mysql->disable,
                $this->lang->mysql->enable,
            ),
            'nav_mysql' => true,
        );
        
        $vars = new Vars();
        if ($vars->isPost()) {
            $form = new FormValidate($data);
            $validate = $form->checkFields($this->validate);
            if (isset($validate['failed'])) {
                $result['validate'] = $validate;
            } else {
                $query = "INSERT INTO user SET username=?, email=?, active=?";
                $params = array(
                    $vars->post('username'),
                    $vars->post('email'),
                    $vars->post('status'),
                );
                $data = $this->db->run($query, $params);
                
                $router = new Router();
                $router->redirect('mysql');
            }
        }
        
        return $result;
    }
}