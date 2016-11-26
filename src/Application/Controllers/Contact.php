<?php

namespace Application\Controllers;

use Lib\Translation;
use Lib\Vars;
use Lib\FormValidate;

/**
 * This class shows an example how to manage a form creation and its validation.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */
class Contact extends Master
{
    /**
     * Holds field types for validating.
     * 
     * @var array 
     */
    private $validate = array(
        'firstname' => 'text',
        'lastname' => 'text',
        'email' => 'email',
        'subject' => 'select',
        'text' => '',
    );
    
    /**
     * Loads object translation.
     * 
     * @var object 
     */
    private $lang;
    
    /**
     * Loads the necessary resources for this page
     */
    public function __construct()
    {
        $this->loadResources('start');
        $languages = new Translation();
        $this->lang = $languages->getFromFile('classes', 'contact');
    }

    /**
     * Creates form validation.
     * 
     * @return array $result
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