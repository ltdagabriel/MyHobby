<?php

include_once getObject('obra');
require_once getObject('especificacao');
require_once getObject('usuario');
require_once getObject('episodio');
require_once getConexaoBD('light_novel');

class Anime extends Obra{
    private $numero_temporada;
    private $lancamento_anime;
    private $episodio;
    
    public function __construct() 
    { 
        parent::__construct();
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    } 

    public function __construct1(Obra $obra) {
        $this->setCodigo($obra->getCodigo());
        $this->setEspecificacao($obra->getEspecificacao());
        $this->setTitulo($obra->getTitulo());
        $this->setTitulo_oficial($obra->getTitulo_oficial());
        $this->setValidacao($obra->getValidacao());
    }

    public function setNumero_temporada($temp) {
        $this->numero_temporada=$temp;
    }
    public function setLancamento_anime($lanc) {
        $this->lancamento_anime=$lanc;
    }
    public function setEpisodio($param) {
        $this->episodio=$param;
    }
    public function getEpisodio() {
        return $this->episodio;
    }
    
    public function info() {
        ?>
        <!-- Portfolio Item Heading -->
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header"><?php echo $this->getTitulo();  ?> <small><?php echo $this->getTitulo_oficial();  ?></small> </h1>
          </div>
        </div>
        <!-- /.row --> 

        <?php $this->getEspecificacao()->info();?>
        <?php 
        $light_novel=new Light_novelC();
            if($light_novel->get($this->getCodigo())){
                ?>
                <h3>Existe Light Novel</h3>
            <?php }?>
        <!-- Related Projects Row -->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header">Episodios</h3>
            <?php 
             $episodio= $this->getEpisodio();
             for($i=0;$i<count($episodio);$i++){
                 $episodio[$i]->info();
             }
            ?>
          </div>
            
        </div>
        <!-- /.row --> 
    </div>
        <?php
    }
}
