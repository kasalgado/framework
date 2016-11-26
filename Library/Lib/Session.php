<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.0
 */

namespace Lib;

/**
 * This class intends to hide server variables to manage sessions.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class Session
{
    /**
     * Checks if a session was already started.
     */
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    /**
     * Sets a session variable or a group of sessions variables.
     * 
     * @param mixed $type
     * @param string $data
     */
    public function set($type, $data = '')
    {
        if (is_array($type)) {
            foreach ($type as $key => $value) {
                $_SESSION[$key] = $value;
            }
        } else {
            $_SESSION[$type] = $data;
        }
    }
    
    /**
     * Gets a session variable or a group of sessions variables.
     * 
     * @param mixed $type
     * @return mixed $result
     */
    public function get($type)
    {
        if (is_array($type)) {
            $result = array();
            
            foreach ($type as $key) {
                if (isset($_SESSION[$key])) {
                    $result[$key] = $_SESSION[$key];
                }
            }
            return $result;
        } else {
            return $_SESSION[$type];
        }
    }
    
    /**
     * Checks if a session variable exists.
     * 
     * @param string $name
     * @return bolean
     */
    public function exists($name)
    {
        return isset($_SESSION[$name]) ? true : false;
    }
    
    /**
     * Deletes a session variable or a group of sessions variables.
     * 
     * @param mixed $type
     */
    public function delete($type)
    {
        if (is_array($type)) {
            foreach ($type as $key) {
                unset($_SESSION[$key]);
            }
        } else {
            unset($_SESSION[$type]);
        }
    }
    
    /**
     * Deletes all session variables.
     */
    public function deleteAll()
    {
        session_unset();
    }
    
    /**
     * Closes session.
     */
    public function destroy()
    {
        session_destroy();
    }
}
