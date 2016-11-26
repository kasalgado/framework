<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */

namespace Lib;

/**
 * The class Router executes routing processes.
 * 
 * @copyright KASalgado 2011 - 2013
 * @author Kleber Salgado <it@kasalgado.de>
 */
class Router
{
    /**
     * Executes a 302 redirection. Data will be passed as url variables.
     * 
     * @param string $class
     * @param string $method
     * @param array $data
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
