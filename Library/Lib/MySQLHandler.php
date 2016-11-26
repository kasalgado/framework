<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.1
 */

namespace Lib;

/**
 * This class creates an DB connection object. It manages two handlers.
 * 
 * @copyright KASalgado 2011 - 2013
 * @author Kleber Salgado <it@kasalgado.de>
 */
abstract class MySQLHandler
{
    /**
     * Creates a MySQL connection through out a PDO handler.
     * 
     * @return object $conn
     */
    protected function PDO_MySQL()
    {
        try {
            $conn = new \PDO(
                'mysql:host=' . APPLICATION_SERVER . ';dbname=' . APPLICATION_MYSQL_DB,
                APPLICATION_USERNAME,
                APPLICATION_PASSWORD
            );

            return $conn;
        } catch (\PDOException $e) {
            echo $e;
        }
    }

    /**
     * Create an SQLite connection through out a PDO handler.
     * 
     * @return object $conn
     */
    protected function PDO_SQLite()
    {
        try {
            $conn = new \PDO('sqlite::' . APPLICATION_PATH . '/models/'
                . APPLICATION_SQLITE_DB . '.sqlite');

            return $conn;
        } catch (\PDOException $e) {
            echo $e;
        }
    }
}
