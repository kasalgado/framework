<?php

/**
 * This class manages the contact form in blog
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.2
 */
class Contact extends Basis
{
    /**
     * Load the necessary resources for this page
     */
    public function __construct()
    {
        $this->createObjects();

        $fileVersion = $this->_fileVersion->get();
        $this->loadResources(array(
            'css' => $fileVersion['css']['posts'],
            'js' => $fileVersion['js']['posts'])
        );
    }

    /**
     * Start the page
     */
    public function index($data = array())
    {
        $message = $data['name'] . ' ' . $data['email'] . ' ' . $data['message'];
        mail('kas_ecu@yahoo.com', 'Contact', $message);

        return $this->_appData;
    }
}