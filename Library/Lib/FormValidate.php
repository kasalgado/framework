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
 * This is a simple validation class that retrieves information from a
 * predefined configuration and switch the corresponding action.
 * 
 * @copyright KASalgado 2011 - 2013
 * @author Kleber Salgado <it@kasalgado.de>
 */
class FormValidate
{
    /**
     * Loads language translations.
     * 
     * @var object 
     */
    private $lang;
    
    /**
     * Holds data information from controller.
     * 
     * @var array 
     */
    private $data;
    
    /**
     * Holds validation parameters for form.
     * 
     * @var array 
     */
    private $validate = array();
    
    /**
     * Prepares local variables enviroment.
     * 
     * @param array $data
     */
    public function __construct(array $data)
    {
        $languages = new Translation();
        $this->lang = $languages->getFromFile('core', 'form_errors');
        $this->data = $data;
    }
    
    /**
     * Switches an action according of the type validation.
     * 
     * @param array $data
     */
    public function checkFields($validate)
    {
        foreach ($validate as $name => $type) {
            switch ($type) {
                case 'email':
                    $this->email($name);
                    continue;
                    break;
                
                case 'text':
                    $this->text($name);
                    continue;
                    break;
                
                case 'select':
                    $this->select($name);
                    continue;
                    break;
            }
            
            $this->required($name);
            
        }
        
        return $this->validate;
    }
    
    /**
     * Prepares data validation for a required field type.
     * 
     * @param type $value
     */
    public function required($value)
    {
        if ($this->data[$value] == null) {
            $this->validate[$value]['error'] = $this->lang->form_errors->empty;
            $this->validate['failed'] = true;
        }
    }
    
    /**
     * Prepares data validation for a email field type.
     * 
     * @param string $value
     */
    public function email($value)
    {
        if (!preg_match('^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-.]?[0-9a-zA-Z])*\\.[a-zA-Z]{2,4}$^', $this->data[$value])) {
            $this->validate[$value]['error'] = $this->lang->form_errors->email;
            $this->validate['failed'] = true;
        }
    }
    
    /**
     * Prepares data validation for a text field type.
     * 
     * @param string $value
     */
    public function text($value)
    {
        if (!preg_match('/^[a-zA-Z]+$/', $this->data[$value])) {
            $this->validate[$value]['error'] = $this->lang->form_errors->text;
            $this->validate['failed'] = true;
        }
    }
    
    /**
     * Prepares data validation for a select field type.
     * 
     * @param string $value
     */
    public function select($value)
    {
        if (!$this->data[$value]) {
            $this->validate[$value]['error'] = $this->lang->form_errors->select;
            $this->validate['failed'] = true;
        }
    }
}