<?php
require "crudEstoque.php";

$p = new crudEstoque();
$lista = $p->retornaTodosProdutos(); // Obtém todos os produtos

if (isset($_GET['sortBy'])) {
    usort($lista, function ($a, $b) {
        if ($_GET['sortBy'] === 'data_validade') { // ordena por data
            return strtotime($a['data_validade']) <=> strtotime($b['data_validade']);
        }
        return $a[$_GET['sortBy']] <=> $b[$_GET['sortBy']]; // senão for data ordena normalmente
    });
}

header('Content-Type: application/json');
echo json_encode($lista);
?>