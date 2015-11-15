<?php

/**
 * This class creates the captcha picture and manages the code for that
 * 
 * @copyright KASalgado 2010 - 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class Captcha
{
    /**
     * Generate the Captcha code
     */
    public function createCode()
    {
        $strCode = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $totStr = strlen($strCode) - 1;

        // Create the code
        $string = '';
        for ($k = 1; $k <= 5; $k++) {
            $rdm = rand(1, $totStr);
            $string .= substr($strCode, $rdm, 1);
        }

        // Save the code into a session variable
        if (isset($_COOKIE['PHPSESSID'])) {
            $imgName = md5('nikas' . $_COOKIE['PHPSESSID']);
        }
        
        $_SESSION['cptCode'] = $string;
        $_SESSION['imgName'] = $imgName;
    }

    /**
     * Create the grafic to put the Captcha code
     * @return string $img
     */
    public function createImg($txtCode)
    {
        $img = ImageCreateFromGIF('img/captcha/bg.gif');
        $bg = ImageColorAllocate($img, 240, 240, 240);
        $color = ImageColorAllocate($img, 0, 0, 0);
        $font = 'img/others/arial.ttf';

        // Create the Captcha image
        ImageTTFText($img, 20, 0, 13, 30, $color, $font, $txtCode);
        ImageJPEG($img, 'img/captcha/' . $_SESSION['imgName'] . '.jpg', 75);
        ImageDestroy($img);
    }

    /**
     * Create a simple sume captcha
     */
    public function sumeCaptcha()
    {
        $val1 = rand(1, 9);
        $val2 = rand(1, 9);
        $result = $val1 + $vale;
        $txtCode = $val1 . ' + ' . $val2;

        $img = ImageCreateFromGIF('img/captcha/bg.gif');
        $bg = ImageColorAllocate($img, 240, 240, 240);
        $color = ImageColorAllocate($img, 0, 0, 0);
        $font = 'img/others/arial.ttf';

        // Create the Captcha image
        ImageTTFText($img, 20, 0, 13, 30, $color, $font, $txtCode);
        ImageJPEG($img, 'img/captcha/box.jpg', 75);
        ImageDestroy($img);

        return $result;
    }

    /**
     * Delete image and session variables
     */
    public function destroyCaptcha()
    {
        if (isset($_SESSION['imgName'])) {
            if (file_exists('img/captcha/' . $_SESSION['imgName'] . '.jpg')) {
                unlink('img/captcha/' . $_SESSION['imgName'] . '.jpg');
                unset($_SESSION['cptCode']);
                unset($_SESSION['imgName']);
            }
        }
    }
}
