<?php
class Config
{
    private $dsn;
    private $username;
    private $password;
    private $pdo;

    public function __construct()
    {
        $this->dsn = "mysql:dbname=BdVidaSaudavel;host=localhost:3306";
        $this->username = "root";
        $this->password = "cimatec";
        $this->pdo = new PDO($this->dsn, $this->username, $this->password);
    }

    public function getPDO()
    {
        return $this->pdo;
    }

    public function __destruct()
    {
        $this->pdo = null;
    }
}
?>