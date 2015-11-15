<?php

/**
 * The class DBTables prepares all queries to create the necessary tables for application.
 * 
 * @copyright KASalgado 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class DBTables
{
    /**
     * Create user table
     * @return string $query
     */
    public static function usersTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(32) NOT NULL,
            email VARCHAR(64) NOT NULL,
            password CHAR(32) NOT NULL,
            type VARCHAR(16) NOT NULL,
            is_active BOOL NOT NULL DEFAULT 1,
            UNIQUE (username, email)
        ) CHARSET utf8 COLLATE utf8_general_ci';
        
        return $query;
    }
    
    /**
     * Create posts table
     * @return string $query
     */
    public static function postsTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS posts (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            title_de VARCHAR(255) NOT NULL,
            title_es VARCHAR(255) NOT NULL,
            title_en VARCHAR(255) NOT NULL,
            description_de TEXT NOT NULL,
            description_es TEXT NOT NULL,
            description_en TEXT NOT NULL,
            folder VARCHAR(32) NOT NULL,
            is_active BOOL NOT NULL DEFAULT 1,
            comments SMALLINT UNSIGNED NOT NULL DEFAULT 0,
            views INT UNSIGNED NOT NULL DEFAULT 0,
            UNIQUE (folder)
        ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }

    /**
     * Create pictures table
     * @return string $query
     */
    public static function picturesTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS pictures (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            f_post INT UNSIGNED NOT NULL,
            text_de VARCHAR(128) NULL,
            text_es VARCHAR(128) NULL,
            text_en VARCHAR(128) NULL,
            xPos SMALLINT NULL,
            yPos SMALLINT NULL,
            arrow ENUM("left", "right") NULL,
            path VARCHAR(128) NOT NULL
         ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }

    /**
     * Create postcomments table
     * @return string $query
     */
    public static function postcommentsTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS postcomments (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            f_post INT UNSIGNED NOT NULL,
            date DATE NOT NULL,
            lang CHAR(2) NOT NULL DEFAULT "de",
            text TEXT NOT NULL,
            is_active BOOL NOT NULL DEFAULT 1
        ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }
    
    /**
     * Create postviews table
     * @return string $query
     */
    public static function postviewsTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS postviews (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            f_post INT UNSIGNED NOT NULL,
            visited_at DATETIME NOT NULL,
            ip VARCHAR(16)
        ) CHARSET utf8 COLLATE utf8_general_ci';
        
        return $query;
    }

    /**
     * Create albums table
     * @return string $query
     */
    public static function albumsTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS albums (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            title_de VARCHAR(128) NOT NULL,
            title_es VARCHAR(128) NOT NULL,
            title_en VARCHAR(128) NOT NULL,
            folder VARCHAR(32) NOT NULL,
            is_active BOOL NOT NULL DEFAULT 1,
            views INT UNSIGNED NOT NULL DEFAULT 0
        ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }

    /**
     * Create photos table
     * @return string $query
     */
    public static function photosTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS photos (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            f_album INT UNSIGNED NOT NULL,
            title_de VARCHAR(255) NOT NULL,
            title_es VARCHAR(255) NOT NULL,
            title_en VARCHAR(255) NOT NULL,
            description_de TEXT NOT NULL,
            description_es TEXT NOT NULL,
            description_en TEXT NOT NULL,
            is_active BOOL NOT NULL DEFAULT 1,
            comments SMALLINT UNSIGNED NOT NULL DEFAULT 0,
            path VARCHAR(128) NOT NULL
        ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }

    /**
     * Create photocomments table
     * @return string $query
     */
    public static function photocommentsTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS photocomments (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            f_photo INT UNSIGNED NOT NULL,
            lang CHAR(2) NOT NULL DEFAULT "de",
            text TEXT NOT NULL,
            is_active BOOL NOT NULL DEFAULT 1
        ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }
    
    /**
     * Create videos table
     * @return string $query
     */
    public static function videosTable() {
        $query = 'CREATE TABLE IF NOT EXISTS videos (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date DATE,
            title_de VARCHAR(128) NOT NULL,
            title_es VARCHAR(128) NOT NULL,
            title_en VARCHAR(128) NOT NULL,
            description_de VARCHAR(255) NOT NULL,
            description_es VARCHAR(255) NOT NULL,
            description_en VARCHAR(255) NOT NULL,
            is_active BOOL NOT NULL DEFAULT 1,
            views INT NOT NULL DEFAULT 0,
            rating TINYINT(1) NOT NULL DEFAULT 5,
            path VARCHAR(128) NOT NULL
        ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }

    /**
     * Create videocomments table
     * @return string $query
     */
    public static function videocommentsTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS videocomments (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date DATE NOT NULL,
            f_video INT UNSIGNED NOT NULL,
            lang CHAR(2) NOT NULL DEFAULT "de",
            text TEXT NOT NULL,
            is_active BOOL NOT NULL DEFAULT 1
        ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }
    
    /**
     * Create dbupdates table
     * @return string $query
     */
    public static function dbupdatesTable()
    {
        $query = 'CREATE TABLE IF NOT EXISTS dbupdates (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            num INT UNSIGNED NOT NULL,
            created DATETIME NOT NULL,
            code TEXT NOT NULL,
            total TINYINT NOT NULL DEFAULT 0,
            errors TINYINT NOT NULL DEFAULT 0
        ) CHARSET utf8 COLLATE utf8_general_ci';

        return $query;
    }
}