<?php

/**
 * 
 * 
 * @copyright KASalgado 2010 - 2015
 * @author Kleber Salgado
 * @version 1.2
 */
class FormValidate
{
    /**
     * 
     * 
     * @param array $data
     */
    public function checkFields($data)
    {
        foreach ($data as $key => $value) {
            
        }
        
        if (isset($data['errmsg'])) {
            $data['errForm'] = true;
        }

        return $data;
    }
    
    public function checkRequiredFields()
    {
        if ($value[0] == null && $value[1] == true) {
            $data[$key] = array($value[0], 'error' => true);
            $data['errmsg'] = $lang->emptyFields;
        }
    }
    
    public function checkEmail()
    {
        if ($value[2] == 'email') {
            if (!preg_match('^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-.]?[0-9a-zA-Z])*\\.[a-zA-Z]{2,4}$^', $value[0])) {
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->noEmail;
            }
        }
    }
    
    public function checkString()
    {
        if ($value[2] == 'string') {
            if (!preg_match('/^./', $value[0])) {  // @TODO: Check the correct format
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->onlyString;
            }
        }
    }
    
    public function checkText()
    {
        if ($value[2] == 'text') {
            if (!preg_match('/^[a-zA-Z]/', $value[0])) {
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->onlyText;
            }
        }
    }
    
    public function checkDate()
    {
        if ($value[2] == 'date') {
            if (!preg_match('/^[0-9]{2}+\.[0-9]{2}+\.[0-9]{4}/', $value[0])) {
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->onlyDate;
            }
        }
    }
    
    public function checkPassword()
    {
        if ($value[2] == 'pw') {
            if (!preg_match('/^[a-zA-Z0-9]{5,}/', $value[0])) {
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->tooShort;
            }
        }
    }
    
    public function checkPasswordIdentical()
    {
        if ($value[2] == 'pwa') {
            if ($value[0] != $data['pw'][0]) {
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->noEqualPw;
            }
        }
    }
    
    public function checkCaptcha()
    {
        if ($value[2] == 'captcha') {
            if ($data['code'][0] != $_SESSION['cptCode']) {
                $data['code'] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->noCaptcha;
            }
        }
    }
    
    public function checkZip()
    {
        if ($value[2] == 'postCode') {
            if (!preg_match('/^[0-9]{5}/', $value[0])) {
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->noPostCode;
            }
        }
    }
    
    public function checkSpaces()
    {
        if ($value[2] == 'oneWord') {
            if (strstr($value[0], ' ')) {
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->noSpaces;
            }
        }
    }
    
    public function checkSelected()
    {
        if ($value[2] == 'select') {
            if (!$value[0]) {
                $data[$key] = array($value[0], 'error' => true);
                if (!isset($data['errmsg']))
                    $data['errmsg'] = $lang->noSelect;
            }
        }
    }
}