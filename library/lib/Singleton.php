<?php

/**
 * Interface to create a Singleton pattern.
 * 
 * @copyright KASalgado 2012 - 2015
 * @author Kleber Salgado
 * @version 1.1
 */
interface Singleton
{
    /**
     * Provide a single instance for the class
     */
    public static function getInstance();
}