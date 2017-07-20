<?php
class Usuario {
  private $codigo;
  private $login;
  private $senha;

  public function setCodigo($codigo) {
      $this->codigo=$codigo;
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function getPerfil() {
    return 0/** Busca perfil passando codigo **/;
  }
  
  public function setLogin($login) {
      $this->login=$login;
  }
  
  public function getLogin(){
      return $this->login;
  }
  public function setSenha($senha) {
      $this->senha=$senha;
  }
  
  public function getSenha(){
      return $this->senha;
  }
}
