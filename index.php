<?php
    require 'classes/util.php';
    $title="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>MyHobby<?php  if($title != ""){    echo ' - '.$title;}?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="include/style.css">
</head>
<body>
<?php include 'include/cabecalho.php';?>
  
<div class="container text-center">    
    <div class="row">
        <?php
        /**
         * Aqui sera carregado a pagina correspondente a url digitada e em caso
         * de url inexistente sera encaminhado para a pagina de erro.
        **/
        $pagina = Url::getURL( 0 );

        if( !$pagina ){
            $pagina = "index";
        }
        if( file_exists( "pagina/" . $pagina . ".php" ) ){
            require "pagina/" . $pagina . ".php";            
        
        }else{
            require "include/error_page.php";
        }
        ?>
    </div>
</div>    
<?php include 'include/rodape.php';?>
</body>
</html>
