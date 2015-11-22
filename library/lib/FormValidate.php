<?php

/**
 * 
 * 
 * @copyright KASalgado 2010 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class FormValidate
{
    /**
     *
     * 
     * @var type 
     */
    private $lang;
    
    /**
     *
     * 
     * @var type 
     */
    private $data;
    
    /**
     *
     * 
     * @var type 
     */
    private $validate = array();
    
    /**
     * 
     * 
     * @param array $data
     */
    public function __construct(array $data)
    {
        $languages = new Languages();
        $this->lang = $languages->getFromFile('core', 'form_errors');
        $this->data = $data;
    }
    
    /**
     * 
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
     * 
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
     * 
     * 
     * @param type $value
     */
    public function email($value)
    {
        if (!preg_match('^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-.]?[0-9a-zA-Z])*\\.[a-zA-Z]{2,4}$^', $this->data[$value])) {
            $this->validate[$value]['error'] = $this->lang->form_errors->email;
            $this->validate['failed'] = true;
        }
    }
    
    /**
     * 
     * 
     * @param type $value
     */
    public function text($value)
    {
        if (!preg_match('/^[a-zA-Z]+$/', $this->data[$value])) {
            $this->validate[$value]['error'] = $this->lang->form_errors->text;
            $this->validate['failed'] = true;
        }
    }
    
    /**
     * 
     * 
     * @param type $value
     */
    public function select($value)
    {
        if (!$this->data[$value]) {
            $this->validate[$value]['error'] = $this->lang->form_errors->select;
            $this->validate['failed'] = true;
        }
    }
}