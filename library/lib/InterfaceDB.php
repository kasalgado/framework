<?php

/**
 * This class set the standar methods to be implemented
 * in the factory pattern
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.0
 */
interface InterfaceDB {
	
	/**
	 * Creates the connection handler
	 */
	public function PDOConnect();
	
	
	/**
	 * Checks the validity of the query string
	 */
	public function checkSQL();
	
	
	/**
	 * Excecutes the query
	 */
	public function run();
}