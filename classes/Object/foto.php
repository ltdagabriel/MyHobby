<?php
class Foto {
  private $codigo;
  private $url;
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

  public function setLegenda($legenda) {
      $this->legenda=$legenda;
  }

  public function getLegenda() {
    return $this->legenda;
  }
  public function form(){
      ?>
    <fieldset>
      <legend>Objeto Foto</legend>
      <div class="form-group"><?php /** Endereço da Imagem **/?>
        <label for="foto-url" class="col-xs-2 col-form-label">url</label>
        <div class="col-xs-10">
            <input type="url" class="form-control" id="foto-url" aria-describedby="urlHelp" placeholder="http://exemple.com/imagem.jpeg">
        </div>
        <small id="urlHelp" class="form-text text-muted">Na versão atual voce deve hospedar a imagem em alguma pagina e copiar a url correspondente a sua imagem aqui!</small>
      </div> <?php /** END - Endereço da Imagem **/?>

      <div class="form-group"><?php /** Legenda para a Imagem **/?>
        <label for="foto-legenda" class="col-xs-2 col-form-label">Informações da imagem</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" id="foto-legenda" aria-describedby="legendaHelp" placeholder="Legenda da imagem">
        </div>
        <small id="legendaHelp" class="form-text text-muted">Se desejar escreva algo sobre a imagem!</small>
      </div> <?php /** END - Legenda para a Imagem **/?>
    </fieldset>
  <?php
  }
}
