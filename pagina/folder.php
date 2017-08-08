<?php
$book=Url::getURL( 1 );
$type=Url::getURL( 0 );

$url=$_SERVER ['REQUEST_URI'];

?>
<div class="row">

    <div><!--/row-->

      <?php
      
      if($book){
        $load=scandir("pagina/".$type);
        $i;	  
        for($i=2;!preg_match("/.php/",$load[$i]) && $i< count($load) ;$i++);
        require "pagina/".$type."/".$load[$i];
      }
      else{
          $load=scandir("pagina/".$type);
        for($i=2; $i< count($load) ;$i++){
            if(!preg_match("/.php/",$load[$i])){
                echo "<li><a href='".$url."/".$load[$i]."'>". arruma($load[$i])."</a></li>";
            }
        }
      }

      ?>

    </div><!--/span-->
</div><!--/.fluid-container-->
