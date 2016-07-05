<?php

namespace Application\tests\Application\Controllers;

use phpunit\framework\TestCase;
use Application\Controllers\Start;

/**
 * Tests Start class.
 *
 * @author Kleber Salgado <it@kasalgado.de>
 */
class StartTest extends TestCase
{
    public function testIndex()
    {
        $class = new Start();
        
        $this->assertArrayHasKey('nav_start', $class->index());
        $this->assertContains('css/app/start.css', $class->css);
        $this->assertContains('js/app/start.js', $class->js);
    }
}
