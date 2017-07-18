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
}
