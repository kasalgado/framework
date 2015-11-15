<?php

/**
 * This class validates the fields in a form
 * 
 * @copyright KASalgado 2010 - 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class FormValidate
{
    /**
     * Probe all data in form and give errors in case of input failed
     * @param array $data
     */
    public function checkFields($data)
    {
        $objLanguages = new Languages();
        $lang = $objLanguages->classXML('scripts.xml');

        foreach ($data as $key => $value) {
            // Required fields
            if ($value[0] == null && $value[1] == true) {
                $data[$key] = array($value[0], 'error' => true);
                $data['errmsg'] = $lang->emptyFields;
            }

            // Check email format
            if ($value[2] == 'email') {
                if (!preg_match('^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-.]?[0-9a-zA-Z])*\\.[a-zA-Z]{2,4}$^', $value[0])) {
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->noEmail;
                }
            }

            // Check string format
            if ($value[2] == 'string') {
                if (!preg_match('/^./', $value[0])) {  // @TODO: Check the correct format
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->onlyString;
                }
            }

            // Check text format
            if ($value[2] == 'text') {
                if (!preg_match('/^[a-zA-Z]/', $value[0])) {
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->onlyText;
                }
            }

            // Check date format
            if ($value[2] == 'date') {
                if (!preg_match('/^[0-9]{2}+\.[0-9]{2}+\.[0-9]{4}/', $value[0])) {
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->onlyDate;
                }
            }

            // Check password format
            if ($value[2] == 'pw') {
                if (!preg_match('/^[a-zA-Z0-9]{5,}/', $value[0])) {
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->tooShort;
                }
            }

            // Check password identical
            if ($value[2] == 'pwa') {
                if ($value[0] != $data['pw'][0]) {
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->noEqualPw;
                }
            }

            // Check captcha code
            if ($value[2] == 'captcha') {
                if ($data['code'][0] != $_SESSION['cptCode']) {
                    $data['code'] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->noCaptcha;
                }
            }

            // Check zip code
            if ($value[2] == 'postCode') {
                if (!preg_match('/^[0-9]{5}/', $value[0])) {
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->noPostCode;
                }
            }

            // Check string without spaces
            if ($value[2] == 'oneWord') {
                if (strstr($value[0], ' ')) {
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->noSpaces;
                }
            }

            // Check string without spaces
            if ($value[2] == 'select') {
                if (!$value[0]) {
                    $data[$key] = array($value[0], 'error' => true);
                    if (!isset($data['errmsg']))
                        $data['errmsg'] = $lang->noSelect;
                }
            }
        }
        if (isset($data['errmsg'])) {
            $data['errForm'] = true;
        }

        return $data;
    }
}