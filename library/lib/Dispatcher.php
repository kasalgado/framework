<?php

/**
 * This class prepares the necessary information for routing
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class Dispatcher
{
    /**
     * Load class name
     */
    private $class;

    /**
     * Load template name
     */
    private $template;

    /**
     * Fetch controller and method name from the url information
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
     * Set template name and path
     * 
     * @return string $template
     * @throws Exception
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
