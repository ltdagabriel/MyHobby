<?php 
//em caso de renomear a pasta renomear apenas no arquivo util.php
include_once getObject('ViewObra_01');
?>
<div class="col-sm-9">
    <?php
    $objeto=new ViewObra_01(/**busca do BD**/);
    for($i=0;$i<count($objeto);$i++){
        
    ?>
    <div class="row">
        <div class="col-sm-4">
          <div class="media">
            <div class="media-left media-middle">
              <a href="<?php echo URL::getBase(); ?>">
                <img class="media-object" src="..." alt="...">
              </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $objeto->getTitulo();?></h4>
                <p><?php 
                    echo substr($objeto->getSinopse(), 0, 200);
                    if(substr($objeto->getSinopse(), 200)){
                    ?>
                    <a href="#" data-toggle="collapse" href="#collapse<?php echo sanitize($objeto->getTitulo());?>" aria-expanded="false">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </a>
                    <a class="collapse" id="collapse<?php echo sanitize($objeto->getTitulo());?>"><?php echo substr($objeto->getSinopse(), 200);?></a>
                    <?php
                    }
                    ?>
                    
                </p>
            </div>
          </div>
        </div>
    </div> 
    <?php
    }
    ?>
</div>
<div class="col-sm-3 well">

    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Versão:1_0!</strong></p>
        Versão inicial da página index
    </div>
</div>
