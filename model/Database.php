<?php

namespace Model;

class Database
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=immo;charset=utf8', 'root', 'blogcomm@php', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}
