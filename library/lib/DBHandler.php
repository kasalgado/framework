<?php

/**
 * This class creates an DB connection object. 
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.0
 */
abstract class DBHandler
{
    /**
     * Create a MySQL connection through a PDO handler. The conection parameters
     * are obtained from enviroment variables, defined already in setup file.
     * 
     * @return $conn contains the conection object
     */
    protected function PDO_MySQL()
    {
        try {
            $conn = new PDO(
                'mysql:host=' . APPLICATION_SERVER . ';dbname=' . APPLICATION_MYSQL_DB,
                APPLICATION_USERNAME,
                APPLICATION_PASSWORD
            );

            return $conn;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    /**
     * Create an SQLite connection through a PDO handler. The database name
     * is obtained from enviroment variables, defined already in setup file.
     * 
     * @return $conn contains the conection object
     */
    protected function PDO_SQLite()
    {
        try {
            $conn = new PDO('sqlite::' . APPLICATION_PATH . '/models/' . APPLICATION_SQLITE_DB . '.sqlite');

            return $conn;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
