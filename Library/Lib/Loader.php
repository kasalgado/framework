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
 * The class Loader prepares data information to assign in templates.
 * 
 * @copyright KASalgado 2014 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class Loader {
    
    /**
     * Loads Smarty object
     * 
     * @var object
     */
    private $smarty;
    
    /**
     * Loads Vars class
     * 
     * @var object
     */
    private $vars;
    
    /**
     * Starts assigning classes into properties
     */
    public function __construct()
    {
        $smartyMachine = new SmartyMachine();
        $this->smarty = $smartyMachine->loadSmarty();
        $this->vars = new Vars();
    }

    /**
     * Gets http or ajax template according to request and assign variables.
     * 
     * @return avoid
     */
    public function get() {
        $this->setLinkVars();
        $this->setLangVars();
        
        if ($this->vars->get('ctr') && $this->vars->get('ctr') == 'ajaxCommander') {
            $template = $this->getAjaxTemplate();
            
            if ($template['response'] == 'json') {
                print($template['data']);
            } else {
                $this->smarty->display($template['data']);
            }
        } else {
            $this->loadResources();
            $this->smarty->display($this->getHttpTemplate());
        }
    }
    
    /**
     * Gets http template and assign variables.
     * 
     * @return string
     */
    private function getHttpTemplate()
    {
        $data = array('ctr' => 'startIndex');

        if ($gets = $this->vars->isGet()) {
            foreach ($gets as $key => $value) {
                $data[$key] = $value;
            }
        }

        if ($posts = $this->vars->isPost()) {
            foreach ($posts as $key => $value) {
                $data[$key] = $value;
            }
        }

        $dispatcher = new Dispatcher();
        $controller = $dispatcher->setController($data);

        $this->smarty->assign('jsApp', $controller['js']);
        $this->smarty->assign('cssApp', $controller['css']);
        $this->smarty->assign('template', $dispatcher->setTemplate());

        if ($controller['vars']) {
            foreach ($controller['vars'] as $key => $value) {
                $this->smarty->assign($key, $value);
            }
        }
        
        return 'index.tpl';
    }
    
    /**
     * Gets Ajax emplate and assign variables.
     * 
     * @return array
     * @throws Exception
     */
    private function getAjaxTemplate()
    {
        foreach ($this->vars->isPost() as $key => $value) {
            $data[$key] = $value;
        }

        $dispatcher = new Dispatcher();
        $controller = $dispatcher->setController($data);

        if ($controller['vars']) {
            foreach ($controller['vars'] as $key => $value) {
                $this->smarty->assign($key, $value);
            }
        }
        
        if (isset($data['response'])) {
            if ($data['response'] == 'html') {
                return array(
                    'response' => 'html',
                    'data' => $dispatcher->setTemplate(),
                );
            } elseif ($data['response'] == 'json') {
                return array(
                    'response' => 'json',
                    'data' => json_encode($controller['vars']),
                );
            } else {
                throw new Exception('Ajax dataType must be html or json');
            }
        } else {
            throw new Exception('response data must be given');
        }
    }
    
    /**
     * Assigns resources as variables into Smarty global object.
     */
    private function loadResources()
    {
        $loadResources = new LoadResources();
        $this->smarty->assign('cssPub', $loadResources->css());
        $this->smarty->assign('jsPub', $loadResources->js());
    }
    
    /**
     * Assigns link paths as variables into Smarty global object.
     */
    private function setLinkVars()
    {
        $uri = basename($_SERVER['REQUEST_URI']);
        $parts = explode('?', $uri);
        
        $self = count($parts) > 1 ? $uri . '&' : APPLICATION_BASENAME . '?';
        
        $this->smarty->assign('self', $self);
        $this->smarty->assign('basename', APPLICATION_BASENAME);
    }
    
    /**
     * Assigns translation values as variables into the Smarty global object.
     */
    private function setLangVars()
    {
        $languages = new Translation();
        $lang = $languages->getTranslations();

        foreach ($lang as $key => $value) {
            $this->smarty->assign('lang_' . $key, $value);
        }
    }
}
