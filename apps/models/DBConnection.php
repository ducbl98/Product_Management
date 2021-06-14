<?php


namespace App\Models;


class DBConnection
{
    protected string $dsn;
    protected string $user;
    protected string $password;

    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=Module2_Exam';
        $this->user = 'root';
        $this->password = 'Leduc1998*';
    }

    public function connect(): \PDO
    {
        try {
            return new \PDO($this->dsn, $this->user, $this->password);
        } catch (\PDOException $PDOException) {
            echo $PDOException->getMessage();
        }
    }
}