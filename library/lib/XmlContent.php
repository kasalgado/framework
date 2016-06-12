<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.1
 */

/**
 * The class XmlContent retrives information as array from an specified xml file.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class XmlContent
{
    /**
     * Gets content.
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