<?php

// Edite os links abaixo.
$arrayDeLinks = [
  "https://brc3.com.br/link-01",
  "https://brc3.com.br/link-02",
  "https://brc3.com.br/link-03",
  "https://brc3.com.br/link-04"
];

require_once('functions.php');

// Registro de log
date_default_timezone_set('America/Sao_Paulo');
registro_log(date('d/m/Y').', '.date('H:i:s').', '.$gerarLink);

// Abaixo crie a sua lógica:
echo "Redireciona para: ". $gerarLink;

// Para direcionar use: header('Location: '.$gerarLink);