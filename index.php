<?php
    require 'classes/util.php';
    $title="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $projeto->getName();
	  if($title != ""){    echo ' - '.$title;}?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="/MyHobby/Imagens/favicon.jpg" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap Core CSS -->
<link href="/Myhobby/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="/Myhobby/css/portfolio-item.css" rel="stylesheet">
<link href="/Myhobby/bootstrap/css/theme.css" rel="stylesheet">

<!-- Mynha CSS -->
<link href="/MyHobby/css/mystyle.css" rel="stylesheet" type="text/css" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php include 'include/header.php';?>
<div class="container">
  <?php
        /**
         * Aqui sera carregado a pagina correspondente a url digitada e em caso
         * de url inexistente sera encaminhado para a pagina de erro.
        **/
        $pagina = Url::getURL( 0 );
        	$pagina=strtr($pagina,array(".php" => ""));
        if( !$pagina ){
            $pagina = "home";// Pagina inicial por hora
        }
        if( file_exists( "pagina/" . $pagina . ".php" ) ){
            require "pagina/" . $pagina . ".php";            
        
        }else{
	header('Location: /MyHobby/');
	  exit;
        }
        ?>
</div>
<hr>
<?php include 'include/rodape.php';?>

<!-- jQuery --> 
<script src="/Myhobby/js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="/Myhobby/js/bootstrap.min.js"></script>
</body>
</html>
