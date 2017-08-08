<!-- Navigation -->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="/MyHobby/"><?php echo $projeto->getName(); ?></a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php gerar_menu_by_diretorio("pagina/")?>
      </ul>
      <form class="form-inline navbar-right" style="margin-top:10px" >
        <fieldset disabled>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        </fieldset>
      </form>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container --> 
</nav>
<?php
function gerar_menu_by_diretorio($pasta){
    if($file = scandir($pasta))
    {
        for($i=2; $i< count($file);$i++)//lista o menu
        {
            if(excessoes($file[$i])){
                 $file[$i]=strtr( $file[$i], array(".php" => "" ));
                ?>
                <li> <a href="<?php echo "/MyHobby/".$file[$i];?>"> <?php echo arruma($file[$i]);?> </a> </li>
                <?php
            }
        }
    }
}   
function excessoes($file){
    return $file!='home.php' && $file!='folder.php';
}

