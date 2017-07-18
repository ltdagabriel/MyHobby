<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">MyHobby</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
        /**
         * Gera um menu apartir da pasta pagina listando todas as paginas que se encontram
         * nesse diretorio.
        **/    
        $pasta = 'pagina/';

        if($file = scandir($pasta))
        {
            for($i=2; $i< count($file);$i++)//lista o menu
            {
                if($file[$i]!='index.php'){
                    ?>
                    <li>
                        <a href="<?php echo $pasta.$file[$i];?>">
                            <?php echo ucfirst(strtr( $file[$i], array( "_" => " " , ".php" => "" )) );//renomeia a saida e remove o .php?>
                        </a>
                    </li>
                    <?php
                }
            }
        }
        ?>
      </ul>
      <?php        
      /**
        include 'include/search.php';
        include 'include/login.php';
      **/
      ?>
      
    </div>
  </div>
</nav>