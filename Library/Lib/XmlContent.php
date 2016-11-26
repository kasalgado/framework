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
 * The class XmlContent retrives information as array from an specified xml file.
 * 
 * @copyright KASalgado 2011 - 2013
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
    public function getContent($path)
    {
        if (!file_exists($path)) {
            throw new \Exception('File ' . $path . ' does not exists.');
        }
        
        $xmlObjet = simplexml_load_file($path);
        $content = array();
        
        foreach ($xmlObjet as $index => $value) {
            foreach ($value as $name => $text) {
                $content[$index][$name] = $text;
            }
        }

        return $content;
    }
}