<?php
// Incluindo arquivo de conexão
require_once('config/connect.php');

$id = (int) $_GET['id'];

// Selecionando fotos
$stmt = $pdo->prepare("SELECT content, type FROM photos WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Se executado
if($stmt->execute()) {
  // Alocando foto
  $photo = $stmt->fetchObject();

  // Se existir
  if($photo != null) {
    // Definindo tipo do retorno
    header('Content-Type: '.$photo->type);

    // Retornando conteúdo
    echo $photo->content;
  }
}