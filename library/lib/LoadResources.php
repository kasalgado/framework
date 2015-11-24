<?php

/**
 * 
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class LoadResources
{
    /**
     * 
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
     * 
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
     * 
     * 
     * @param type $class
     * @param type $version
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
     * 
     * 
     * @param type $class
     * @param type $version
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