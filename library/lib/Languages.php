<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.1
 */
class Languages
{
    const DEFAULT_CORE_FILE = 'core';
    const DEFAULT_PUBLIC_FILE = 'public';
    const DEFAULT_FILE_EXTENSION = 'xml';
    
    /**
     *
     * 
     * @var object
     */
    private $session;
    
    /**
     * 
     */
    public function __construct()
    {
        $this->session = new Session();
    }
    
    /**
     * 
     * 
     * @return type
     */
    public function setLanguages()
    {
        $core = $this->xmlToArray(self::DEFAULT_CORE_FILE);
        $public = $this->xmlToArray(self::DEFAULT_PUBLIC_FILE);
        
        $lang = array();
        foreach (array_merge($core, $public) as $index => $value) {
            $lang[$index] = $value;
        }

        return $lang;
    }

    /**
     * 
     * 
     * @param type $file
     * @param type $child
     * @return \stdClass
     * @throws Exception
     */
    public function getFromFile($file, $child = '')
    {
        $lang = new stdClass();
        $path = APPLICATION_PATH . '/language/' . $this->session->get('lang') . '/' . $file . '.xml';

        if (!file_exists($path)) {
            throw new Exception('File ' . $file . ' does not exists.');
        }
        
        $xml = simplexml_load_file($path);

        if ($child) {
            foreach ($xml->$child as $index => $value) {
                $lang->$index = $value;
            }
        } else {
            foreach ($xml as $index => $value) {
                $lang->$index = $value;
            }
        }

        return $lang;
    }

    /**
     * 
     * 
     * @param type $name
     * @return type
     */
    private function xmlToArray($name)
    {
        $path = APPLICATION_PATH . '/language/' . $this->session->get('lang') . '/';
        
        return json_decode(
            json_encode(
                (array) simplexml_load_file($path . $name . '.' . self::DEFAULT_FILE_EXTENSION,
                'SimpleXMLElement',
                LIBXML_NOCDATA)
            ),
            1
        );
    }
}