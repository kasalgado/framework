<?php

/**
 * This class manages the contact form in blog
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.2
 */
class Contact extends Master
{
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
        $languages = new Languages();
        $this->lang = $languages->classXML('scripts.xml');
    }

    /**
     * 
     * 
     * @return type
     */
    public function index()
    {
        $select = array(
            $this->lang->contact->support,
            $this->lang->contact->report,
        );
        
        return array(
            'select' => $select,
        );
    }
}