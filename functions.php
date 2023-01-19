<?php

$arquivoDoLink = 'ultimo-link.txt'; 
global $arquivoDoLink;

$gerarLink = trocarPosicao(ler($arquivoDoLink), $arrayDeLinks);

function gravar($texto, $arquivo) {
  file_put_contents($arquivo, $texto);
}

function ler($arquivo) {
	return file_get_contents($arquivo);
}

function trocarPosicao($ultimoLink, $arrayDeLinks) {
  global $arquivoDoLink;
  $posicao = array_search($ultimoLink, $arrayDeLinks);
  $qtLinks = count($arrayDeLinks) - 1;
  $proximo = $posicao < $qtLinks ? $posicao + 1 : 0;
  gravar($arrayDeLinks[$proximo], $arquivoDoLink);
  
  return $arrayDeLinks[$proximo];
}

function registro_log($texto) {
  if(!is_dir(__DIR__.'/logs/'.date('d-m-Y'))) {
    mkdir(__DIR__.'/logs/'.date('d-m-Y'), 0777, true);
  }

  if(!file_exists(__DIR__.'/logs/'.date('d-m-Y').'/log.csv')) {
    fopen(__DIR__.'/logs/'.date('d-m-Y').'/log.csv','w');
    file_put_contents(__DIR__.'/logs/'.date('d-m-Y').'/log.csv', "data,hora,valor\r\n", FILE_APPEND);
  }
  
  $texto = $texto."\r\n";
  file_put_contents(__DIR__.'/logs/'.date('d-m-Y').'/log.csv', $texto, FILE_APPEND);
}

