<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class Contact extends Master
{
    /**
     * Hold fields for validate form
     * 
     * @var type 
     */
    private $validate = array(
        'firstname' => 'text',
        'lastname' => 'text',
        'email' => 'email',
        'subject' => 'select',
        'text' => '',
    );
    
    /**
     *
     * 
     * @var type 
     */
    private $lang;
    
    /**
     * Load the necessary resources for this page
     */
    public function __construct()
    {
        $this->loadResources('start');
        $languages = new Translation();
        $this->lang = $languages->getFromFile('classes', 'contact');
    }

    /**
     * 
     * 
     * @return type
     */
    public function index($data)
    {
        $result = array(
            'data' => $data,
            'select' => array(
                $this->lang->contact->subject,
                $this->lang->contact->support,
                $this->lang->contact->report,
            ),
            'nav_contact' => true,
        );
        
        $vars = new Vars();
        if ($vars->isPost()) {
            $form = new FormValidate($data);
            $validate = $form->checkFields($this->validate);
            if (isset($validate['failed'])) {
                $result['validate'] = $validate;
            } else {
                // Code for email sending
                $result['success'] = true;
            }
        }
        
        return $result;
    }
}