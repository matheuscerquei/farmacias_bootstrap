<?php
require "configPDO.php";

class produtos
{

    protected $ID_produto;
    protected $nome;
    protected $preco;
    protected $quantidade;
    protected $categoria;
    protected $data_validade;

    function __construct($ID_produto = null, $nome = null, $preco = null, $quantidade = null, $categoria = null, $data_validade = null)
    {
        $this->ID_produto = $ID_produto;
        $this->nome = htmlspecialchars($nome);
        $this->preco = htmlspecialchars($preco);
        $this->quantidade = htmlspecialchars($quantidade);
        $this->categoria = htmlspecialchars($categoria);
        $this->data_validade = htmlspecialchars($data_validade);
    }
}
class crudEstoque extends produtos
{
    function cadastrarProduto(produtos $p)
    {

        $c = new config();
        $pdo = $c->getPDO();

        $sql = $pdo->prepare("SELECT * FROM produtos WHERE nome = :nome AND categoria = :categoria;");
        $sql->bindValue(':nome', $p->nome);
        $sql->bindValue(':categoria', $p->categoria);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            // produto com nome e categoria já cadastradas
            return false;
        } else {
            //cadastra o produto novo 
            $sql = $pdo->prepare("INSERT INTO produtos (nome, preco, quantidade, categoria, data_validade) VALUES (:nome, :preco, :quantidade, :categoria, :data_validade);");
            $sql->bindValue(':nome', $p->nome);
            $sql->bindValue(':preco', $p->preco);
            $sql->bindValue(':quantidade', $p->quantidade);
            $sql->bindValue(':categoria', $p->categoria);
            $sql->bindValue(':data_validade', $p->data_validade);

            if ($sql->execute()) {
                // cadastrardo com sucesso 
                return true;
            }
        }
    }

    function  retornaTodosProdutos() //retorna os protudos cadstrados como uma lista ordenada
    {
        $c = new config();
        $pdo = $c->getPDO();

        $sql = $pdo->query("SELECT * FROM produtos");
        if (!$sql->execute()) {
            echo '<script>console.log("falha na conexão com o banco")</script>';
            return false;
        }

        if ($sql->rowCount() > 0) {
            $lista = [];
            $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        }
    }

    function retornaPorNome(produtos $p) // retorna todos regsitros encontrados com um mesmo nome
    {
        $c = new config();
        $pdo = $c->getPDO();

        $sql = $pdo->prepare("SELECT * FROM produtos WHERE nome = :nome");
        $sql->bindValue(':nome', $p->nome);

        if ($sql->rowCount() > 0) {
            // retorna os registros encontrados
            $lista = [];
            $lista = $sql->fetchAll();
            return $lista;
        } else {
            // nome não encontrado no banco
            return false;
        }
    }
}
