<?php


namespace App\Models;


class Models
{
    protected \PDO $connection;

    public function __construct()
    {
        $DBConnection= new DBConnection();
        $this->connection=$DBConnection->connect();
    }
}