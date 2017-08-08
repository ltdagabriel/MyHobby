<?php
include_once getConexaoBD("anime");
include_once getObject('anime');
$url = Url::getURL( 1 );// carrega o codigo do anime da url

  if( !$url ){
      echo 'bom ta na pagina mas sem argumentos';  
      /**header('Location: /MyHobby/');**/
  }
  else{
  
    $animeC=new AnimeC();
    $anime= $animeC->get($url);
    
    $anime->info();
  }

?>

