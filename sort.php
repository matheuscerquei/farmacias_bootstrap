<?php
require "crudEstoque.php";

$p = new crudEstoque(null, $_POST['nomeInput']);
$lista = $p->retornaTodosProdutos();

if (isset($_GET['sortBy'])) {

    usort($lista, function ($a, $b) {
        if ($_GET['sortBy'] === 'validade') { // ordena por data
            return strtotime($a['data_validade']) <=> strtotime($b['data_validade']);
        }
        return $a[$_GET['sortBy']] <=> $b[$_GET['sortBy']]; // senão for data ordena normalmente
    });
}

header('Content-Type: application/json');
echo json_encode($lista);
