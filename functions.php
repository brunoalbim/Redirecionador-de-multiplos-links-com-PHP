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