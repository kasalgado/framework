<?php

namespace Application\tests\Application\Controllers;

use phpunit\framework\TestCase;
use Application\Controllers\Javascript;

/**
 * Tests JavaScript class.
 *
 * @author Kleber Salgado <it@kasalgado.de>
 */
class JavascriptTest extends TestCase
{
    private $class;
    
    public function __construct()
    {
        $this->class = new Javascript();
    }
    
    public function testJavascript()
    {
        defined('APPLICATION_BASENAME') || define('APPLICATION_BASENAME',
            basename($_SERVER['PHP_SELF']));
        
        $this->assertArrayHasKey('nav_javascript', $this->class->index());
        $this->assertContains('css/app/javascript.css', $this->class->css);
        $this->assertContains('js/app/javascript.js', $this->class->js);
    }
}
