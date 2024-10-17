<?php
require "configPDO.php";

class produtos
{

    private $ID_produto;
    private $nome;
    private $preco;
    private $quantidade;
    private $categoria;
    private $data_validade;

    function __construct($ID_produto , $nome, $preco, $quantidade, $categoria, $data_validade)
    {
        $this->ID_produto = $ID_produto;
        $this->nome = htmlspecialchars($nome);
        $this->preco = htmlspecialchars($preco);
        $this->quantidade = htmlspecialchars($quantidade);
        $this->categoria = htmlspecialchars($categoria);
        $this->data_validade = htmlspecialchars($data_validade);
    }

    function cadastrarProduto(produtos $p)
    {

        $c = new config();
        $pdo = $c->getPDO();

        $sql = $pdo->prepare("SELECT * FROM produtos WHERE nome = :nome AND categoria = :categoria;");
        $sql->bindValue(':nome', $p->nome);
        $sql->bindValue(':categoria', $p->categoria);

        if (!$sql->execute()) {
            // caso haja uma falha na conexão
            echo '<script>console.log("falha na conexão com o banco")</script>';
            return false;
        }
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
                echo "funcionou";
                return true;
            } else {
                //cadastro falhou
                echo '<script>console.log("falha na conexão com o banco")</script>';
                return false;
            }
        }
    }

    function retornaTodosProdutos() //retorna os protudos cadstrados como uma lista ordenada
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
        } else {
            // houve algum erro na conexão com o banco
            echo '<script>console.log("")</script>';
            return false;
        }
    }

    function retornaPorNome(produtos $p) // retorna todos regsitros encontrados com um mesmo nome
    {
        $c = new config();
        $pdo = $c->getPDO();

        $sql = $pdo->prepare("SELECT * FROM produtos WHERE nome = :nome");
        $sql->bindValue(':nome', $p->nome);

        if (!$sql->execute()) {
            echo '<script>console.log("falha na conexão com o banco")</script>';
            return false;
        }
        if ($sql->rowCount() > 0) {
            // retorna os registros encontrados
            $lista = [];
            $lista = $sql->fetchAll();
            return $lista;
        }else{
            // nome não encontrado no banco
            return false;
        }
    }
}
