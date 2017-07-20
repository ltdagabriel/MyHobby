<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/MyHobby">MyHobby</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php
        gerar_menu_by_diretorio('./pagina/');
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
<?php
function gerar_menu_by_diretorio($pasta){
    if($file = scandir($pasta))
    {
        for($i=2; $i< count($file);$i++)//lista o menu
        {
            if($file[$i]!='index.php'){
                if(is_dir($file[$i])){
                    ?>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ucfirst(strtr( $file[$i], array( "_" => " " , ".php" => "" )) );?><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <?php gerar_menu_by_diretorio($file[$i]);?>
                      </ul>
                  </li>
                    <?php
                    
                }
                else{
                    topico( $file[$i]);
                }
            }
        }
    }
}
function topico($file){
    $file=strtr( $file, array( "_" => " " , ".php" => "" ));
    ?>
        <li>
            <a href="<?php echo $file;?>">
                <?php echo ucfirst($file);?>
            </a>
        </li>        
    <?php
}
?>