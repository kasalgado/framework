<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.1
 */
class XMLImport
{
    /**
     * 
     * 
     * @param string $fileName
     * @return array $lang
     */
    public function getContent($file)
    {
        $xmlObjet = simplexml_load_file(APPLICATION_PATH . '/utils/' . $file);
        $content = array();
        
        foreach ($xmlObjet as $index => $value) {
            foreach ($value as $name => $text) {
                $content[$index][$name] = $text;
            }
        }

        return $content;
    }
}