<?php

class Idioma {
  private $codigo;
  private $lingua;
  private $pais;

  public function setCodigo($codigo) {
      $this->codigo=$codigo;
  }
  public function getCodigo() {
    return $this->codigo;
  }

  public function setLingua($lingua) {
      $this->lingua=$lingua;
  }

  public function getLingua() {
    return $this->lingua;
  }

  public function setPais($pais) {
      $this->pais=$pais;
  }

  public function getPais() {
    return $this->pais;
  }
  public function form() {
      ?>
    <fieldset class="col-xs-12 text-center">
    <legend>Objeto Idioma</legend>
      <div class="form-group col-xs-6"><?php /** lingua **/?>
        <label for="lingua" class="col-sm-12 col-md-2 col-form-label">Linguagem</label>
        <div class="col-md-10 col-sm-12">
            <input type="text" class="form-control" id="lingua" aria-describedby="linguaHelp" placeholder="Japanese">
        </div>
        <small id="linguaHelp" class="form-text text-muted">Liguagem que se fala no objeto!</small>
      </div> 
    
      <div class="form-group col-xs-6"><?php /** Pais **/?>
        <label for="pais" class="col-sm-12 col-md-2 col-form-label">Linguagem</label>
        <div class="col-md-10 col-sm-12">
            <input type="text" class="form-control" id="pais" aria-describedby="paisHelp" placeholder="Japanese">
        </div>
        <small id="paisHelp" class="form-text text-muted">pais na qual é falada a lingua!</small>
      </div> 
    </fieldset>
      <?php
  }
}
