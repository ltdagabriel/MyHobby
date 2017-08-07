<?php
$capitulo=Url::getURL( 2 );
$book=Url::getURL( 1 );
$type=Url::getURL( 0 );
$diretorio="pagina/".$type."/".$book;
$url=$_SERVER ['REQUEST_URI'];
$prev=NULL;
$next=NULL;
if(!isset($_COOKIE[$book])){
    $_COOKIE[$book]=$capitulo;
}
if($capitulo==NULL){
    $capitulo=strtr(scandir($diretorio)[2],array(".php" =>""));
    if(isset($_COOKIE[$book])){
        $capitulo=$_COOKIE[$book];
    }
    $url=$url."/".$capitulo;
}

$list;
if($file = scandir($diretorio)){
  $list=$file;
}
?>
    <div class="row">
     <div class="col-md-3 visible-lg visible-md">
          <div class="nav-tabs-dropdown btn-block">
            <ul class="nav nav-tabs nav-pills nav-stacked wells">
              <?php
              for($i=2;$i<count($list);$i++){
              $valor= strtr($list[$i], array(".php" => ""));
              if($_COOKIE[$book]< $valor ){
                $_COOKIE[$book]=$valor;
              }
              ?>
              <li <?php if($valor==$capitulo) { 
                echo "class='active'";
                if($i-1 >1){$prev=strtr($list[$i-1], array(".php" => "","/"=>""));}
                if($i+1< count($list)){$next=strtr($list[$i+1], array(".php" => "","/"=>""));}
              }?> >
                  <?php $valor= strtr($valor, array("/"=>""));?>
                  <a href="<?php echo strtr($url, array($capitulo => $valor));?>"><?php echo strtr($valor,array( "_" => " "));?></a>
              </li>
              <?php
              }
              ?>
              </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="col-sm-12 col-md-9"><!--/row-->
          
          <?php 
          require $diretorio."/".$capitulo.".php";?>
          
        </div><!--/span-->
        </div><!--/.fluid-container-->
        <ul class="pager">
            <li class="previous <?php if($prev==NULL){echo "disabled";}?>"><a href="<?php echo strtr($url, array($capitulo => $prev));?>">&larr; Previous</a></li>
            <li class="next <?php if($next==NULL){echo "disabled";}?>"><a href="<?php echo strtr($url, array($capitulo => $next));?>">Next &rarr;</a></li>
        </ul>
