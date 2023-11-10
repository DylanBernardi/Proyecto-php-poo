<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'Dylan29', '29841', 'tienda_master');
        $db->query("SET NAMES 'uft-8'");
        return $db;
    }
}
