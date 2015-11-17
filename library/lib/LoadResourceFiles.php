<?php

/**
 * This class loads all CSS and JS files for this application
 * 
 * @copyright KASalgado 2010 - 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class LoadResourceFiles
{
    /**
     * Search and load all CSS files
     */
    public function loadCssFiles()
    {
        $files = array();
        $html = '';
        $path = 'css/';

        foreach (glob('css/*.css') as $file) {
            $html .= '<link href="' . $file . '" rel="stylesheet" type="text/css" media="all" />';
        }
        return $html;
    }

    /**
     * Search and load all JavaScript files who are resources if application
     * @return string $html
     */
    public function loadJsFiles()
    {
        $files = array();
        $html = '';
        $path = 'js/';

        foreach (glob('js/*.js') as $file) {
            if ($file != 'js/jquery.js')
                $html .= '<script type="text/javascript" src="' . $file . '"></script>';
        }
        return $html;
    }

    /**
     * 
     * 
     */
    public function loadJsFile($class, $version)
    {
        $version =$version ? $version : '';
        $html = '<script type="text/javascript" src="js/app/' . $class . $version . '.js"></script>';

        return $html;
    }

    /**
     * 
     * 
     */
    public function loadCssFile($class, $version)
    {
        $version =$version ? $version : '';
        $html = '<link href="css/app/' . $class . $version . '.css" rel="stylesheet" type="text/css" media="all" />';

        return $html;
    }

    /**
     * Search and load extern JS code
     * @param array $data possible keys are:
     * <ul>
     *      <li><i>file</i>: file name</li>
     *      <li><i>path</i>: path to search the file</li>
     *      <li><i>params</i>: array with parameter to transfer</li>
     * </ul>
     * @return $html HTML code
     */
    public function loadJsLibrary($data)
    {
        $html = '';

        foreach ($data as $value) {
            $html .= '<script type="text/javascript" src="' . $value['path'] . '/' . $value['file'] . '.js';

            if ($value['params']) {
                $html .= '?';
                foreach ($value['params'] as $var => $content) {
                    $html .= '&' . $var . '=' . $content;
                }

                $html .= '"></script>';
            } else {
                $html .= '"></script>';
            }
        }

        return $html;
    }

    /**
     * Search and load extern CSS code
     * @param array $data possible keys are:
     * <ul>
     *      <li><i>file</i>: file name</li>
     *      <li><i>path</i>: path to search the file</li>
     * </ul>
     * @return $html HTML code
     */
    public function loadCssLibrary($data)
    {
        $html = '<link href="' . $data['path'] . '/' . $data['file'] . '.css" rel="stylesheet" type="text/css" media="all" />';

        return $html;
    }
}