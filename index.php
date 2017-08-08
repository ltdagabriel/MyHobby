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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link href="/Myhobby/css/portfolio-item.css" rel="stylesheet">
<link href="/Myhobby/css/mystyle.css" rel="stylesheet">
<link href="/Myhobby/css/theme.css" rel="stylesheet">


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
        try{
            if( !$pagina ){
                $pagina = "home";// Pagina inicial por hora
            }
            $page=false;
            $load=scandir("pagina/");
            for($i=2; $i< count($load) ;$i++){
                if(!preg_match("/.php/",$load[$i])){
                    if($load[$i]== $pagina){
                        $page='pagina/folder.php';
                    }
                }
            }
            if($page){
                require $page;
            }
            else if( file_exists( "pagina/" . $pagina . ".php" ) ){
                   require "pagina/" . $pagina . ".php";            

               }else{
               header('Location: /MyHobby/');
                 exit;
               }
        }
        catch (Exception $e)
        {
               
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
