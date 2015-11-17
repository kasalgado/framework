<?php

/**
 * This class executes SQL queries through a PDO connection object.
 * This class uses a Factory design pattern and implements the Singleton design pattern.
 * For the query evaluation will be used prepared statements.
 * 
 * @copyright KASalgado 2010 - 2012
 * @author Kleber Salgado
 * @version 1.2
 */
class MySqlRunQuery extends DBHandler implements Singleton
{
    /**
     * Create an instance object 
     */
    private static $instance = null;

    /**
     * Create a prepared statement object
     */
    private $prepare;
    
    /**
     * MySQL resource object
     */
    private $conn;

    /**
     * Provides an only instance for this class
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
     * Checks and evaluates if the query is correct an throw an exception in case of failed.
     * 
     * @param <var>query</var> string - containst the SQL query with placeholders
     * @param <var>params</var> array - contains the values for the placeholders
     * @return <var>data</var> array - contains query result by sucessfull, otherwise false
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
     * Execute an SQL query according to the action.
     * 
     * @param <var>query</var> string - containst the SQL query with placeholders
     * @param <var>params</var> array - contains the values for the placeholders
     * @return <var>data</var> array - contains data results
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
     * Retrieve the last ID from a requested table
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
     * after to execute the query, which the id must be retrieved.
     * 
     * @return int
     */
    public function lastInsertedId()
    {
        return $this->conn->lastInsertId();
    }
}
