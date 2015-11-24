<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class Router
{
    /**
     * 
     * 
     * @param type $class
     * @param type $method
     * @param type $data
     * @throws Exception
     */
    public function redirect($class, $method = 'Index', $data = array())
    {
        $dataurl = '';
        if ($data) {
            foreach ($data as $key => $value) {
                $dataurl .= '&' . $key . '=' . $value;
            }
        }

        if (class_exists($class) && method_exists($class, $method)) {
            header('location: ' . APPLICATION_BASENAME . '?ctr=' .
                $class . ucfirst($method) . $dataurl);
        } else {
            throw new Exception('Or class ' . $class . ' or method ' . $method .
                ' does not exists');
        }
    }
}
