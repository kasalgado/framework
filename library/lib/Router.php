<?php

/**
 * This class routes the application to a new controller and action
 * 
 * @copyright KASalgado 2010 - 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class Router
{
    /**
     * Reload the page and assign the new information
     * @param string $control
     * @param string $action
     * @param array $data
     * @return null
     */
    public function route($control, $method = 'Index', $data = array())
    {
        // Prepare data to send them per url
        $dataurl = '';
        
        if ($data) {
            foreach ($data as $key => $value) {
                $dataurl .= '&' . $key . '=' . $value;
            }
        }

        // Check if the control and methode exists
        $class = ucfirst($control);
        
        if (class_exists($class) && method_exists($class, $method)) {
            $ctr = strtolower($control) . ucfirst($method);
            $url = 'index.php?ctr=' . $ctr . '&act=' . $method . $dataurl;

            header('location: ' . $url);
        } else {
            // Error routine
            echo 'ERROR!';
            die();
        }
    }
}
