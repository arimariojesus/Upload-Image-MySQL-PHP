<?php
// Incluindo arquivo de conexão
require_once('./config/connect.php');

// Selecionando fotos
$stmt = $pdo->query('SELECT id, name, type, size FROM images.photos');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Salvando imagens no banco de dados com PHP/MySQL</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1 class="">Salvar imagens no banco de dados com PHP/MySQL</h1>

    <p>
      <a class="btn btn-success" href="./register.html">Cadastrar</a>
    </p>

    <div class="row">
      <?php while ($photo = $stmt->fetchObject()): ?>

      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="./showImage.php?id=<?= $photo->id ?>" />

          <div class="caption">
            <strong>Nome: </strong> <?=$photo->name?> <br/>
            <strong>Tipo: </strong> <?=$photo->type?> <br/>
            <strong>Tamanho: </strong> <?=$photo->size?> <br/>
          </div>
        </div>
      </div>

      <?php endwhile; ?>
    </div>
  </div>

  <script src="./Ajax/script.js"></script>
</body>
</html>