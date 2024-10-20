<?php
require "crudEstoque.php";

// Verifica se o formulário foi enviado
if (isset($_POST['nomeInput']) && !empty($_POST['nomeInput'])) {
    $nome =  trim($_POST['nomeInput']);
    $p = new crudEstoque(null, $nome);
    $lista = []; 
    $lista = $p->retornaPorNome($p);
}
if ($lista == false) {
    $lista = $p->retornaTodosProdutos(); // Retorna todos os produtos se nenhum nome foi fornecido
}
header("Location: pesquisaProduto.php?lista=" . urlencode($lista));
exit();
?>