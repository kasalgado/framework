<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.1
 */

namespace Lib;

/**
 * The class Translation fetches translation strings from XML files and
 * returns them as array.
 * 
 * @copyright KASalgado 2011 - 2013
 * @author Kleber Salgado <it@kasalgado.de>
 */
class Translation
{
    const DEFAULT_CORE_FILE = 'core';
    const DEFAULT_PUBLIC_FILE = 'public';
    const DEFAULT_FILE_EXTENSION = 'xml';
    
    /**
     * Loads a session.
     * 
     * @var object
     */
    private $session;
    
    /**
     * Starts a session.
     */
    public function __construct()
    {
        $this->session = new Session();
    }
    
    /**
     * Fetches public and core translations.
     * 
     * @return array $lang
     */
    public function getTranslations()
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
     * Fetches translations from an specified file.
     * 
     * @param string $file
     * @param string $child
     * @return \stdClass
     * @throws Exception
     */
    public function getFromFile($file, $child = '')
    {
        $lang = new \stdClass();
        $path = APPLICATION_PATH . '/Language/' . $this->session->get('lang') . '/' . $file . '.xml';

        if (!file_exists($path)) {
            throw new \Exception('File ' . $file . ' does not exists.');
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
     * Converts data from an object into an array.
     * 
     * @param string $name
     * @return array
     */
    private function xmlToArray($name)
    {
        $path = APPLICATION_PATH . '/Language/' . $this->session->get('lang') . '/';
        
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