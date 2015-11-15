<?php

/**
 * 
 * 
 * @copyright KASalgado 2011 - 2015
 * @author Kleber Salgado
 * @version 1.0
 */
class Cookie
{
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
    
    public function get($type)
    {
        if (is_array($type)) {
            $result = array();
            
            foreach ($type as $key) {
                if (isset($_COOKIE[$key])) {
                    $result[$key] = $_COOKIE[$key];
                }
            }
            return $result;
        } else {
            if (isset($_COOKIE[$type])) {
                return $_COOKIE[$type];
            }
        }
    }
    
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
