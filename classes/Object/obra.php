<?php
require_once getObject('especificacao');
require_once getObject('usuario');

class Obra {
  private $codigo;
  private $especificacao;
  private $validacao;
  private $comentario;
  private $adicionado_by;
  private $adicionado;
  private $titulo;
  private $titulo_oficial;

  public function __construct() {
      $this->comentario=array();
  }

  public function setEspecificacao(Especificacao $especificacao) {
      $this->especificacao=$especificacao;
  }

  public function getEspecificacao() {
    return $this->especificacao;
  }

  public function setCodigo($codigo) {
      $this->codigo=$codigo;    
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function setValidacao($validacao) {
      $this->validacao=$validacao;
  }

  public function getValidacao() {
    return $this->validacao;
  }

  public function setComentario($comentario) {
      $this->comentario=$comentario;
  }

  public function getComentario() {
    return $this->comentario;
  }

  public function setAdicionado($adicionado) {
      $this->adicionado=$adicionado;
  }

  public function getAdicionado() {
    return $this->adicionado;
  }

  public function setAdicionado_by(Usuario $adicionado_by) {
      $this->adicionado_by=$adicionado_by;
  }

  public function getAdicionado_by() {
    return $this->adicionado_by;
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
}