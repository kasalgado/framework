<?php

/**
 * This file is part of an open source framework. The file could be used
 * or modified free of charge.
 * 
 * (c) Kleber Salgado <it@kasalgado.de>
 * @version 1.1
 */

namespace Lib;

/**
 * Interface to create a Singleton pattern.
 * 
 * @copyright KASalgado 2011 - 2013
 * @author Kleber Salgado <it@kasalgado.de>
 */
interface Singleton
{
    /**
     * Provide a single instance for the class
     */
    public static function getInstance();
}
