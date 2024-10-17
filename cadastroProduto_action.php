<?php 
include "crudEstoque.php";
///////////////////////mudar isso depois
$p = new produtos(null ,"teste", 6.66, 666, "ANALGÉSICOS", date('Y-m-d'));
print_r($p);
$teste = $p->cadastrarProduto($p);

?>