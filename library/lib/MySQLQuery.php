<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */

/**
 * This class prepares SQL queries and executes them. The class uses a Factory
 * design pattern and implements the Singleton design pattern. For the query
 * evaluation will be used prepared statements.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class MySQLQuery extends MySQLHandler implements Singleton
{
    /**
     * Creates an instance object 
     */
    private static $instance = null;

    /**
     * Creates a prepared statement object
     */
    private $prepare;
    
    /**
     * Loads MySQL resource object
     */
    private $conn;

    /**
     * Provides an only instance for this class.
     * 
     * @return MySqlRunQuery
     */
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Prepares SQL query for its execution.
     * 
     * @param string $query
     * @param array $params
     * @return obejct $data
     * @throws Exception
     */
    private function checkSQL($query, array $params)
    {
        $this->conn = $this->PDO_MySQL();
        $this->prepare = $this->conn->prepare($query);

        if (!$data = $this->prepare->execute($params)) {
            $error = $this->prepare->errorInfo();
            throw new Exception($error[2]);
        }

        return $data;
    }

    /**
     * Runs SQL query. Possible actions are:
     * - fetchRow
     * - fetchAll
     * 
     * @param sring $query
     * @param array $params
     * @param string $action
     * @return array $data
     */
    public function run($query, $params = array(), $action = '')
    {
        $data = array();

        try {
            $data = $this->checkSQL($query, $params);

            switch ($action) {
                case 'fetchRow':
                    $data = $this->prepare->fetch(PDO::FETCH_ASSOC);
                    break;

                case 'fetchAll':
                    $data = $this->prepare->fetchAll(PDO::FETCH_ASSOC);
                    break;
            }
        } catch (Exception $e) {
            echo $e;
        }

        return $data;
    }
    
    /**
     * Retrieves the last ID from an specified table.
     * 
     * @params string $table
     * @return int $id
     */
    public function lastId($table)
    {
        $query = 'SELECT MAX(id) id FROM' . $table;
        $exec = $this->run($query, array(), 'fetchRow');
        
        return $exec['id'];
    }
    
    /**
     * Retrieve the las ID from an executed query. This function must be called
     * after to execute the query.
     * 
     * @return int
     */
    public function lastInsertedId()
    {
        return $this->conn->lastInsertId();
    }
}
