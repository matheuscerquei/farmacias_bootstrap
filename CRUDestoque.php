<?php
require "configPDO.php";

class produtos
{

    private $ID_produto;
    private $nome;
    private $preco;
    private $quantidade;
    private $categoria;
    private $validade;

    function __construct($ID_produto, $nome, $preco, $quantidade, $categoria, $validade)
    {
        $this->$ID_produto = $ID_produto;
        $this->$nome = htmlspecialchars($nome);
        $this->$preco = htmlspecialchars($preco);
        $this->$quantidade = htmlspecialchars($quantidade);
        $this->$categoria = htmlspecialchars($categoria);
        $this->$validade = htmlspecialchars($validade);
    }

    function cadastrarProduto(produtos $p)
    {

        $c = new config();
        $pdo = $c->getPDO();

        $sql = $pdo->query("SELECT * FROM produtos WHERE nome = :nome AND categoria = :categoria");
        $sql->bindValue(':nome', $p->nome);
        $sql->bindValue(':categoria', $p->categoria);

        $sql->execute();
        if ($sql->rowCount() > 0) {
            // produto com nome e categoria já cadastradas
            return false;
        } else {
            //cadastra o produto novo 
            $sql = $pdo->prepare("INSERT INTO produtos (nome, preco, quantidade, categoria, data_validade) VALUES (:nome, :preco, :quantidade, :categoria, :data_validade)");
            $sql->bindValue(':nome', $p->nome);
            $sql->bindValue(':preco', $p->preco);
            $sql->bindValue(':quantidade', $p->quantidade);
            $sql->bindValue(':categoria', $p->categoria);
            $sql->bindValue(':data_validade', $p->validade);

            if ($sql->execute()) {
                // cadastrardo com sucesso 
                return true;
            } else {
                //cadastro falhou
                return false;
            }
        }
    }

    function 
}
