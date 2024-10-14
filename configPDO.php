<?php
class config
{
    private $dsn = "mysql:dbname=BdVidaSaudavel;host=localhost:3306";
    private $username = "root";
    private $password = "";

    public $pdo = new PDO($dsn, $username, $password);
    // $pdo = new PDO("mysql:dbname=BdVidaSaudavel;host=localhost:3306","root","cimatec");
    function __destruct()
    { // é chamado automaticamente quando o objeto é destruido ou no fim do script
        // aparentemente é aconselhavel explicitar que a conexão seja pelo objeto seja atribuida a null
        $this->pdo = null;
    }
}
?>