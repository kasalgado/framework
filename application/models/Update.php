<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class Update
{
    public static function Run()
    {
        $tables = array(
            self::User(),
            self::Info(),
        );
        
        return implode('; ', $tables);
    }
    
    /**
     * 
     * 
     * @return string $query
     */
    public static function User()
    {
        $query = 'CREATE TABLE IF NOT EXISTS user (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(32) NOT NULL,
            email VARCHAR(64) NOT NULL,
            password CHAR(32) NOT NULL,
            UNIQUE (username, email)
        ) CHARSET utf8 COLLATE utf8_general_ci';
        
        return $query;
    }
}