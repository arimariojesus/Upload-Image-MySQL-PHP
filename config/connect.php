<?php
// Informações para conexão
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'images';
$dsn = "mysql:host={$host};dbname={$banco}";

try {
  // Conectando
  $pdo = new PDO($dsn, $usuario, $senha);
}catch (PDOException $e) {
  // Se ocorrer algum erro na conexão
  die($e->getMessage());
}