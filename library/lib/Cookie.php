<?php

/**
 * This class pretends to hide the common functions to work with cookies.
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.0
 */
class Cookie
{
    /**
     * Set a cookie or an arrange of cookies specified for an array.
     * 
     * @param mix $type
     * @param string $data
     * @param integer $time
     */
    public function set($type, $data = '', $time = 3600)
    {
        if (is_array($type)) {
            foreach ($type as $key => $value) {
                setcookie($key, $value, time() + $time);
            }
        } else {
            setcookie($type, $data, time() + $time);
        }
    }
    
    /**
     * Get a cookie value or an arrange of values within an array.
     * 
     * @param mix $type
     * @return mix $value
     */
    public function get($type)
    {
        if (is_array($type)) {
            $values = array();
            foreach ($type as $key) {
                if (isset($_COOKIE[$key])) {
                    $values[$key] = $_COOKIE[$key];
                }
            }
            return $values;
        } else {
            if (isset($_COOKIE[$type])) {
                return $_COOKIE[$type];
            }
        }
    }
    
    /**
     * Delete an specific cookie or an arrange of cookies within an array.
     * 
     * @param mix $type
     */
    public function delete($type)
    {
        if (is_array($type)) {
            foreach ($type as $key) {
                if (isset($_COOKIE[$key])) {
                    unset($_COOKIE[$key]);
                    setcookie($key, '', time() - 3600, '/');
                }
            }
        } else {
            if (isset($_COOKIE[$type])) {
                unset($_COOKIE[$type]);
                setcookie($type, '', time() - 3600, '/');
            }
        }
    }
}
