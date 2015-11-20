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
    /**
     * 
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
     * 
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
     * 
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