<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Augusto Mizu">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-png" href="./imgens/icon_navegador2.png">
  <title>Estoque</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="margin-left: 20%; margin-right: 20%;">
  <div id="nav_bar_padrao" style="margin-bottom: 100px;"></div>
  <section class="border border-3 border-light rounded p-3 row" style="padding: 50;">
    <form action="cadastro_action.php" method="post">
      <div class="mb-2 w-75">
        <label for="nameInput">Nome do produto</label>
        <input type="text" class="form-control" required>
      </div>
      <div class="mb-2 d-flex col">
        <div class="w-50">
          <label for="precoInput">Preço</label>
          <input type="number" id="precoInput" step="0.01" min="0.01" class="form-control w-50" required>
        </div>
        <div class="w-50">
          <label for="quantidadeInput">Quantidade</label>
          <input type="number" id="quantidadeInput" step="1" min="1" class="form-control w-50" required>
        </div>
      </div>
      <div class="mb-2 d-flex col">
        <div class="w-50">
          <label for="categoriaInput">Categoria</label>
          <select name="categoriaSelect" id="categoriaSelect" class="form-control w-50">
            <option value="" disabled selected>Selecione...</option>
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
          <input type="date" id="dataInput" class="form-control w-50" min="<?php echo date('Y-m-d'); ?>" placeholder="Selecione uma data...">
        </div>
      </div>
    </form>
  </section>

  <script>
    fetch('nav_bar_padrao.html')
      .then(response => response.text())
      .then(data => {
        document.getElementById('nav_bar_padrao').innerHTML = data;
      });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>