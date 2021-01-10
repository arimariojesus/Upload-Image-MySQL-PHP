<?php

// Função que retorna um JSON com a propriedade succeso e mensagem
function returnMessage($message, $success = false) {
  // Criando vetor com as propriedades
  $return = array();
  $return['success'] = $success;
  $return['message'] = $message;

  // Convertendo para JSON e retornando 
  return json_encode($return);
}