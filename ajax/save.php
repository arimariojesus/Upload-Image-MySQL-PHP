<?php
// Incluindo arquivo de conexão
require_once('../config/connect.php');

// Funções de utilidade
require_once('../utils/message.php');

// Constantes
define('MAX_SIZE', (2 * 1024 * 1024));

// Verificando se selecionou alguma image
if(!isset($_FILES['foto'])) {
  echo returnMessage('Selecione uma imagem');
  exit;
}

// Recupera os dados dos campos
$photo = $_FILES['foto'];
$name = $photo['name'];
$type = $photo['type'];
$size = $photo['size'];

// Validações básicas
// Formato
if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $type)) {
  echo returnMessage('Isso não é uma imagem válida');
  exit;
}

if($size > MAX_SIZE) {
  echo returnMessage('A imagem deve possuir no máximo 2MB');
  exit;
}

// Transformando foto em dados (binário)
$content = file_get_contents($photo['tmp_name']);

// Preparando comando
$stmt = $pdo->prepare('INSERT INTO photos (name, content, type, size) VALUES (:name, :content, :type, :size)');

// Definindo parâmetros
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':content', $content, PDO::PARAM_LOB);
$stmt->bindParam(':type', $type, PDO::PARAM_STR);
$stmt->bindParam(':size', $size, PDO::PARAM_INT);

// Executando e exibindo resultado
echo ($stmt->execute()) ? returnMessage('Foto cadastrada com sucesso', true) : returnMessage($stmt->errorInfo());