<?php
class Genero {
  private $codigo;
  private $nome;

  public function setCodigo($codigo) {
      $this->codigo=$codigo;
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function setNome($nome) {
      $this->nome=$nome;
  }

  public function getNome() {
    return $this->nome;
  }
  
  public function form() {
      ?>
      <label class="checkbox-inline">
          <input type="checkbox" id="genero<?php echo $this->codigo; ?>" value="option<?php echo $this->codigo; ?>"> <?php echo $this->nome; ?>
      </label>
      <?php
  }
}
