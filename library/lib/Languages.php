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
     * Look for the XML file an assign into an array
     * @param string $fileName
     * @return array $lang
     */
    public function langXML($fileName, $path = null)
    {
        $lang = array();
        $absPath = $path ? $path : APPLICATION_PATH;
        $absPath .= '/language/' . $_SESSION['lang'] . '/' . $fileName;

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
     * @param string $fileName
     * @return XML array $xmlObject
     */
    public function classXML($fileName)
    {
        $lang = new stdClass();
        $path = APPLICATION_PATH . '/language/' . $_SESSION['lang'] . '/' . $fileName;

        if (file_exists($path)) {
            $xmlObjet = simplexml_load_file($path);
            
            foreach ($xmlObjet as $value) {
                foreach ($value as $name => $text) {
                    $lang->$name = $text;
                }
            }

            return $lang;
        } else {
            return array();
        }
    }

    /**
     * Prepare the language files to be showed as only one array
     * @param array $files possible key is addFile as name of the optional XML file
     * @return array $lang contains an only variable with the language text
     */
    public function prepare($file = array())
    {
        $xmlCore = $this->langXML('core.xml');
        $xmlPublic = $this->langXML('public.xml');
        $lang = array_merge($xmlCore, $xmlPublic);

        if (isset($_SESSION['xmlFile']) && $_SESSION['xmlFile']) {
            $xmlFile = $this->langXML($_SESSION['xmlFile']);
            $lang = array_merge($lang, $xmlFile);
        }

        if (isset($file['addFile']) && array_key_exists('addXML', $file['addFile'])) {
            $addFile = $this->langXML($file['addFile']['addXML']);
            $lang = array_merge($lang, $addFile);
        }

        if (((isset($_SESSION['admin']) && $_SESSION['admin']))) {
            $adminFile = $this->langXML('admin.xml');
            $lang = array_merge($lang, $adminFile);
        }

        return $lang;
    }
}
