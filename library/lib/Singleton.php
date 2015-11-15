<?php

/**
 * Interface to create a Singleton pattern.
 * 
 * @author Kleber Salgado
 * @version 1.1
 */
interface Singleton
{
    /**
     * Provide the single instance for the class
     */
    public static function getInstance();
}