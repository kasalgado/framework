<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */

/**
 * This class prepares the necessary information for routing. Assigns controller
 * and template names
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class Dispatcher
{
    /**
     * Loads class name
     */
    private $class;

    /**
     * Loads template name
     */
    private $template;

    /**
     * Sets controller and method name from the url information.
     * 
     * @param array $params
     * @return array $data
     */
    public function setController($params)
    {
        $match = array();
        preg_match('/[A-Z]/', $params['ctr'], $match, PREG_OFFSET_CAPTURE);
        $this->class = ucfirst(substr($params['ctr'], 0, $match[0][1]));
        $method = $this->template = strtolower(substr($params['ctr'], $match[0][1]));

        $loadClass = new $this->class();
        $vars = $loadClass->$method($params);

        $data = array('vars' => $vars);
        
        if (!isset($params['response'])) {
            $data['js'] = $loadClass->js;
            $data['css'] = $loadClass->css;
        }
        
        return $data;
    }

    /**
     * Sets template name.
     * 
     * @return string $template
     * @throws Exception
     */
    public function setTemplate()
    {
        $template = $this->class . '/' . $this->template . '.tpl';
        
        if (file_exists(APPLICATION_PATH . '/views/templates/' . $template)) {
            return $template;
        } else {
            throw new Exception('Template ' . $template . ' not found!');
        }
    }
}
