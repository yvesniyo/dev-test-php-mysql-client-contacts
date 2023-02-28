<?php

namespace App;

use mysqli;

class DbConnection
{
    public static ?mysqli $mysqli = null;

    /**
     * make a connection to db and store it for fast usage without opening a new one
     */
    public static function make()
    {
        if (is_null(self::$mysqli)) {
            $host = getenv('DATABASE_HOST');
            $username = getenv('DATABASE_USERNAME');
            $password = getenv('DATABASE_PASSWORD');
            $databaseName = getenv('DATABASE_NAME');
            $port = getenv("DATABASE_PORT");

            // Create connection
            self::$mysqli = new mysqli($host, $username, $password, $databaseName, $port);

            // Check connection
            if (self::$mysqli->connect_error) {
                die('Connection failed: ' . self::$mysqli->connect_error);
            }
        }

        return self::$mysqli;
    }
}
