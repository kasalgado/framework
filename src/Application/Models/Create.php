<?php

namespace Application\Models;

/**
 * This class only acts as a dummy class to hold SQL queries for table creation.
 * 
 * @copyright KASalgado 2011 - 2013
 * @author Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */
class Create
{
    /**
     * Collects queries to be executed from console.
     * 
     * @return string
     */
    public static function Run()
    {
        $tables = array(
            self::User(),
            self::Info(),
        );
        
        return implode('; ', $tables);
    }
    
    /**
     * Creates User sample table.
     * 
     * @return string $query
     */
    public static function User()
    {
        $query = 'CREATE TABLE IF NOT EXISTS user (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(32) NOT NULL,
            email VARCHAR(64) NOT NULL,
            active BOOLEAN NOT NULL DEFAULT false,
            UNIQUE (username, email)
        ) CHARSET utf8 COLLATE utf8_general_ci';
        
        return $query;
    }
    
    /**
     * Creates Info sample table.
     * 
     * @return string $query
     */
    public static function Info()
    {
        $query = 'CREATE TABLE IF NOT EXISTS info (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            address VARCHAR(64) NOT NULL,
            city VARCHAR(16) NOT NULL,
            country CHAR(16) NOT NULL
        ) CHARSET utf8 COLLATE utf8_general_ci';
        
        return $query;
    }
}
