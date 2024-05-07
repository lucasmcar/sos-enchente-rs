<?php

namespace App\Connection;

class ConnectionInstance
{
    protected static $connection;

    public static function getInstance()
    {
        self::$connection = new Connection();
        return self::$connection;
    }

}