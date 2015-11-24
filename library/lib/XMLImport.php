<?php

/**
 * This class manages XML files to be imported
 * 
 * @copyright KASalgado 2011 - 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class XMLImport
{
    /**
     * Look for the XML file an assign into an array
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