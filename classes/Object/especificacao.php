<?php
require_once 'genero.php';
require_once 'foto.php';
class Especificacao {
  
  private $lancamento;
  private $imagem;
  private $trailer;
  private $genero;
  private $sinopse;
  private $titulo;
  private $titulo_oficial;
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

  public function setTitulo($titulo) {
      $this->titulo=$titulo;
  }

  public function getTitulo() {
    return $this->titulo;
  }

  public function setTitulo_oficial($titulo_oficial) {
      $this->titulo_oficial=$titulo_oficial;
  }

  public function getTitulo_oficial() {
    return $this->titulo_oficial;
  }
  public function setEstudio($estudio) {
      $this->estudio=$estudio;
  }

  public function getEstudio() {
    return $this->estudio;
  }
}
