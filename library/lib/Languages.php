<?php

/**
 * This class manages language views on application
 * 
 * @copyright KASalgado 2010 - 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class Languages
{
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
     * Look for the XML file an assign into an array
     * 
     * @param string $file
     * @return array $lang
     */
    public function langXML($file, $path = null)
    {
        $lang = array();
        $absPath = $path ? $path : APPLICATION_PATH;
        $absPath .= '/language/' . $this->session->get('lang') . '/' . $file;

        if (file_exists($absPath)) {
            $xmlObjet = simplexml_load_file($absPath);

            foreach ($xmlObjet as $value) {
                foreach ($value as $name => $text) {
                    $lang[$name] = $text;
                }
            }

            return $lang;
        } else {
            return array();
        }
    }

    /**
     * Look for the XML file an assign it to an array
     * 
     * @param string $fileName
     * @return XML array $xmlObject
     */
    public function classXML($file)
    {
        $lang = new stdClass();
        $path = APPLICATION_PATH . '/language/' . $this->session->get('lang') . '/' . $file;

        if (file_exists($path)) {
            $xmlObjet = simplexml_load_file($path);
            
            foreach ($xmlObjet as $value) {
                foreach ($value as $name => $text) {
                    $lang->$name = $text;
                }
            }

            return $lang;
        } else {
            throw new Exception('File ' . $file . ' does not exists.');
        }
    }

    /**
     * Prepare the language files to be showed as only one array
     * 
     * @param array $files
     * @return array $lang
     */
    public function prepare($file = array())
    {
        return array_merge($this->langXML('core.xml'), $this->langXML('public.xml'));
    }
}
