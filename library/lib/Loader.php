<?php

/**
 * 
 * 
 * @copyright KASalgado 2011 - 2015
 * @author Kleber Salgado
 * @version 1.0
 */
class Loader {
    
    /**
     *
     * 
     * @var type 
     */
    private $smarty;
    
    /**
     *
     * 
     * @var type 
     */
    private $vars;
    
    /**
     * 
     */
    public function __construct()
    {
        $smartyMachine = new SmartyMachine();
        $this->smarty = $smartyMachine->loadSmarty();
        $this->vars = new Vars();
    }

    /**
     * 
     */
    public function get() {
        $this->smarty->assign('basename', APPLICATION_BASENAME);
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
            $this->smarty->display($this->getTemplate());
        }
    }
    
    /**
     * 
     * 
     * @return string
     */
    private function getTemplate()
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

        // Create variables to assign CSS and JS resources
        $this->smarty->assign('jsApp', $controller['js']);
        $this->smarty->assign('cssApp', $controller['css']);

        // Create variable to assign the template
        $this->smarty->assign('template', $dispatcher->loadTemplate());

        // Assign variables which are passed as parameters
        if ($controller['vars']) {
            foreach ($controller['vars'] as $key => $value) {
                $this->smarty->assign($key, $value);
            }
        }
        
        return 'index.tpl';
    }
    
    /**
     * 
     * 
     * @return type
     * @throws Exception
     */
    private function getAjaxTemplate()
    {
        foreach ($this->vars->isPost() as $key => $value) {
            $data[$key] = $value;
        }

        $dispatcher = new Dispatcher();
        $controller = $dispatcher->setController($data);

        // Assign variables for the template
        if ($controller['vars']) {
            foreach ($controller['vars'] as $key => $value) {
                $this->smarty->assign($key, $value);
            }
        }
        
        if (isset($data['response'])) {
            if ($data['response'] == 'html') {
                return array(
                    'response' => 'html',
                    'data' => $dispatcher->loadTemplate(),
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
     * 
     */
    private function loadResources()
    {
        $loadResources = new LoadResources();
        $this->smarty->assign('cssPub', $loadResources->css());
        $this->smarty->assign('jsPub', $loadResources->js());
    }
    
    /**
     * 
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
