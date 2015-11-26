<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class Dispatcher
{
    /**
     * Save class name
     */
    private $class;

    /**
     * Save template name
     */
    private $template;

    /**
     * Set the path, class name and method name
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
     * Set the path and template name
     */
    public function loadTemplate()
    {
        $template = $this->class . '/' . $this->template . '.tpl';
        
        if (file_exists(APPLICATION_PATH . '/views/templates/' . $template)) {
            return $template;
        } else {
            throw new Exception('Template ' . $template . ' not found!');
        }
    }
}
