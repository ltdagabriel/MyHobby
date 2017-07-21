<?php
require_once getObject('idioma');
class Video {
  private $codigo;
  private $url;
  private $duracao;
  private $qualidade;
  private $idioma;
  private $legenda;

  public function setCodigo($codigo) {
      $this->codigo=$codigo;
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function setUrl($url) {
    $this->url=$url;
  }

  public function getUrl() {
    return $this->url;
  }

  public function setDuracao($duracao) {
      $this->duracao=$duracao;
  }

  public function getDuracao() {
    return $this->duracao;
  }

  public function setQualidade($qualidade) {
      $this->qualidade=$qualidade;
  }

  public function getQualidade() {
    return $this->qualidade;
  }

  public function setIdioma($idioma) {
      $this->idioma=$idioma;
  }

  public function getIdioma() {
    return $this->idioma;
  }

  public function setLegenda($legenda) {
      $this->legenda=$legenda;
  }

  public function getLegenda() {
    return $this->legenda;
  }
  public function form(){
      ?>
    <fieldset class="col-xs-12 text-center">
      <legend>Objeto Video</legend>
      <div class="form-group"><?php /** Endereço do Video **/?>
        <label for="video-url" class="col-sm-12 col-md-2 col-form-label">URL</label>
        <div class="col-md-10 col-sm-12">
            <input type="url" class="form-control" id="video-url" aria-describedby="urlvideoHelp" placeholder="http://exemple.com/video.mp4">
        </div>
        <small id="urlvideoHelp" class="form-text text-muted">Nessesario estar hospedade em alguma pagina e copiar a url correspondente a sua imagem aqui!</small>
      </div> 

      <div class="form-group col-sm-6"><?php /** Duração **/?>
        <label for="video-duracao" class="col-sm-12 col-md-2 col-form-label">Duração</label>
        <div class="col-md-10 col-sm-12">
            <input type="text" class="form-control" id="video-duracao" aria-describedby="duracaoHelp">
        </div>
        <small id="duracaoHelp" class="form-text text-muted">Duração total do video</small>
      </div>
      
      <div class="form-group col-sm-6"><?php /** Qualidade **/?>
        <label for="video-qualidade" class="col-sm-12 col-md-2 col-form-label">Qualidade</label>
        <div class="col-md-10 col-sm-12">
            <select class="form-control" id="video-qualidade">
                <option>SD</option>
                <option>480p</option>
                <option>720p</option>
                <option>1080p</option>
                <option>Blu-ray</option>
            </select>
        </div>
      </div>
      
      <?php Idioma::form();?>
    </fieldset>
  <?php
  }
}
