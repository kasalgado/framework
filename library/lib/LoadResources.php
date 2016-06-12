<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.2
 */

/**
 * This class loads all necessary resources to work in the application.
 * 
 * @copyright KASalgado 2013 - 2015
 * @author Kleber Salgado <it@kasalgado.de>
 */
class LoadResources
{
    /**
     * Searches for all css files and creates a unique html string.
     * 
     * @return string $html
     */
    public function css()
    {
        $html = '';
        foreach (glob('css/*.css') as $file) {
            $html .= '<link href="' . $file . '" rel="stylesheet" type="text/css" media="all" />';
        }
        
        return $html;
    }

    /**
     * Searches for all js files and creates a unique html string.
     * 
     * @return string $html
     */
    public function js()
    {
        $jquery = glob('js/jquery*.js');
        $html = '<script type="text/javascript" src="' . $jquery[0] . '"></script>';
        
        foreach (glob('js/*.js') as $file) {
            if ($file != $jquery[0]) {
                $html .= '<script type="text/javascript" src="' . $file . '"></script>';
            }
        }
        
        return $html;
    }

    /**
     * Searches for an specified js file, located at the app folder.
     * 
     * @param string $class
     * @param string $version
     * @return string $html
     */
    public function jsApp($class, $version)
    {
        $version = $version ? $version : '';
        $html = '<script type="text/javascript" src="js/app/' . $class . 
            $version . '.js"></script>';

        return $html;
    }

    /**
     * Searches for an specified css file, located at the app folder.
     * 
     * @param string $class
     * @param string $version
     * @return string $html
     */
    public function cssApp($class, $version)
    {
        $version = $version ? $version : '';
        $html = '<link href="css/app/' . $class . $version .
            '.css" rel="stylesheet" type="text/css" media="all" />';

        return $html;
    }
}