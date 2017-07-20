<?php
require_once getObject('genero');
require_once getObject('foto');
require_once getConexaoBD('genero');
class Especificacao {
  
  private $lancamento;
  private $imagem;
  private $trailer;
  private $genero;
  private $sinopse;
  private $estudio;
  public function __construct() {
      $this->genero = array();
  }

  public function setLancamento($lancamento) {
      $this->lancamento=$lancamento;
  }

  public function getLancamento() {
    return $this->lancamento;
  }

  public function setImagem(Foto $imagem) {
      $this->imagem=$imagem;
  }

  public function getImagem() {
    return $this->imagem;
  }

  public function setTrailer($trailer) {
      $this->trailer=$trailer;
  }

  public function getTrailer() {
    return $this->trailer;
  }

  public function setGenero(Genero $genero) {
      for($i=0;$i<count($genero);$i++){
          array_push($this->genero, $genero[$i]);
      }
  }

  public function getGenero() {
    return $this->genero;
  }

  public function setSinopse($sinopse) {
      $this->sinopse=$sinopse;
  }

  public function getSinopse() {
    return $this->sinopse;
  }

  public function setEstudio($estudio) {
      $this->estudio=$estudio;
  }

  public function getEstudio() {
    return $this->estudio;
  }
  
  public function form(){
      ?>
      <div class="form-group row"><?php /** Data de Lancamento **/?>
        <label for="date-lancamento" class="col-xs-2 col-form-label">Data de Lançamento</label>
        <div class="col-xs-10">
          <input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" id="date-lancamento">
        </div>
      </div>
      
      <?php Foto::form();/** Foto **/?> 
      <?php /** TRAILER **/ ?>
      
      <?php /** Lista de Genero **/
      $genero= generoC::getAll();
      for($i=0;$i<count($genero);$i++){
          $genero[$i]->form();
      }
      ?>

      <?php
  }
}
