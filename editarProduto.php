<?php
$nome = urldecode($_GET['nome']);
$preco = urldecode($_GET['preco']);
$quantidade = urldecode($_GET['quantidade']);
$categoria = urldecode($_GET['categoria']);
$validade = urldecode($_GET['validade']);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Matheus Cerqueira Monteiro">
    <link rel="shortcut icon" type="image/x-png" href="./imgens/icon_navegador2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body style="margin-left: 25%; margin-right: 25%; background-color: #ffffff;">
    <div id="nav_bar_padrao" style="margin-bottom: 100px;"></div>
    <main class="border border-3 rounded p-5" style="border: rgba(255, 0, 0, .5); backdrop-filter: blur(5px); backdrop-filter: hue-rotate(80deg);">
        <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
            EDITAR PRODUTO</h1>
        <form action="#" method="post" id="formEditar">
            <div class="mb-2 w-75">
                <label for="nomeInput">Nome do produto</label>
                <input type="text" name="nomeInput" class="form-control" value="<?= $nome ?>" maxlength="30" placeholder="Nome" required>
            </div>
            <div class="mb-2 d-flex col">
                <div class="w-50">
                    <label for="precoInput">Preço</label>
                    <input type="number" name="precoInput" step="0.01" min="0.01" value="<?= $preco ?>" placeholder="Preço" class="form-control w-50" required>
                </div>
                <div class="w-50">
                    <label for="quantidadeInput">Quantidade</label>
                    <input type="number" name="quantidadeInput" step="1" min="1" value="<?= $quantidade ?>" placeholder="Quantidade" class="form-control w-50" required>
                </div>
            </div>
            <div class="mb-2 d-flex col">
                <div class="w-50">
                    <label for="categoriaInput">Categoria</label>
                    <select name="categoriaSelect" id="categoriaSelect" class="form-control w-50" required>
                        <option value="<?= $categoria ?>" disabled selected><?= $categoria ?></option>
                        <option value="ANALGÉSICOS">ANALGÉSICOS</option>
                        <option value="ANTI-INFLAMATÓRIOS">ANTI-INFLAMATÓRIOS</option>
                        <option value="ANTIBIÓTICOS">ANTIBIÓTICOS</option>
                        <option value="ANTIVIRAIS">ANTIVIRAIS</option>
                        <option value="ANTIFÚNGICOS">ANTIFÚNGICOS</option>
                        <option value="ANTIDEPRESSIVOS">ANTIDEPRESSIVOS</option>
                        <option value="ANSIOLÍTICOS">ANSIOLÍTICOS</option>
                        <option value="ANTIPSICÓTICOS">ANTIPSICÓTICOS</option>
                        <option value="ANTIHISTAMÍNICOS">ANTIHISTAMÍNICOS</option>
                        <option value="ANTIHIPERTENSIVOS">ANTIHIPERTENSIVOS</option>
                        <option value="DIURÉTICOS">DIURÉTICOS</option>
                        <option value="IMUNOSSUPRESSORES">IMUNOSSUPRESSORES</option>
                        <option value="OUTROS">OUTROS</option>
                    </select>
                </div>
                <div class="w-50">
                    <label for="dataInput">Validade</label>
                    <input type="date" name="dataInput" class="form-control w-50" min="<?php echo date('Y-m-d'); ?>" value="<?= $validade ?>" placeholder="Selecione uma data..." required>
                </div>
            </div>
            <input type="button" id="salvar" value="SALVAR" class="btn btn-success btn-lg mt-4 " onclick="confirmarEdicao()">
        </form>
    </main>
    <script>
        //carrega o nav bar 
        fetch('nav_bar_padrao.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('nav_bar_padrao').innerHTML = data;
            });
    </script>
    <script>
        ////////// caixa para corfirmar edição
        function confirmarEdicao(id) {
            const confirmacao = confirm("Você tem certeza que deseja editar este produto?");
            if (confirmacao) {
                // Redireciona para o script de exclusão com confirmação
                window.location.href = `editarProduto_action.php?id=${id}&confirmar=true`;
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>