<?php

/**
 * This class creates all necessary tables to work in the application
 * 
 * @copyright KASalgado 2010
 * @author Kleber Salgado
 * @version 1.0
 */
class CreateTables
{
    public static function GenerateTables()
    {
        $db = MySqlRunQuery::getInstance();

        include_once APPLICATION_PATH . '/models/DBTables.class.php';
        $tables = get_class_methods('DBTables');
        foreach ($tables as $table) {
            $query = DBTables::$table();
            $db->run($query);
        }
    }
}
