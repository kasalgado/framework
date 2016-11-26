<?php

namespace Application\Models;

/**
 * This class only acts as a dummy class to hold SQL queries for table updating.
 * 
 * @copyright KASalgado 2011 - 2013
 * @author Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */
class Update
{
    /**
     * Collects queries to be executed from console.
     * 
     * @return string
     */
    public static function Run()
    {
        $updates = array(
            self::addUser1(),
            self::addUser2(),
        );
        
        return implode('; ', $updates);
    }
    
    /**
     * Insterts a new user.
     * 
     * @return string $query
     */
    public static function addUser1()
    {
        $query = "INSERT INTO `user` (username, email, active)
            VALUES ('kasalgado', 'it@test.de', true)";
        
        return $query;
    }
    
    /**
     * Inserts a new user.
     * 
     * @return string $query
     */
    public static function addUser2()
    {
        $query = "INSERT INTO `user` (username, email, active)
            VALUES ('kronos', 'info@test.de', false)";
        
        return $query;
    }
}