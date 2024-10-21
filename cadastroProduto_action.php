<?php
include "crudEstoque.php";

$nome = $_POST['nomeInput'];
$preco = $_POST['precoInput'];
$quantidade = $_POST['quantidadeInput'];
$categoria = $_POST['categoriaSelect'];
$data_validade = $_POST['dataInput'];

$p = new crudEstoque(null, $nome, $preco, $quantidade, $categoria, $data_validade);
$cadastrado = null;

$salva = $p->cadastrarProduto($p);
if ($salva == true) { // caso o retorno de cadastro seja verdadeiro retorna a cadastro
    $cadastrado = true;
    header("Location:cadastroProduto.php?cadastrado=" . $cadastrado);
}else{
    $cadastrado = false;
    header("Location:cadastroProduto.php?cadastrado=" . $cadastrado);
}
exit();
?>