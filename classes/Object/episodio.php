<?php
getObject('video');
getObject('usuario');
/**
 * TODO Auto-generated comment.
 */
class Episodio {
  /**
   * TODO Auto-generated comment.
   */
  private $video;
  private $codigo;
  /**
   * TODO Auto-generated comment.
   */
  private $numero_episodio;
  /**
   * TODO Auto-generated comment.
   */
  private $nome_episodio;
  /**
   * TODO Auto-generated comment.
   */
  private $no_ar;
  /**
   * TODO Auto-generated comment.
   */
  private $adicionado;
  /**
   * TODO Auto-generated comment.
   */
  private $adicionado_by;

  /**
   * TODO Auto-generated comment.
   */
  public function setVideo($video) {
  
      $this->video=$video;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function getVideo() {
    return $this->video;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function setNumero_episodio($numero_episodio) {
  
      $this->numero_episodio=$numero_episodio;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function getNumero_episodio() {
    return $this->numero_episodio;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function setNome_episodio($nome_episodio) {
  
      $this->nome_episodio=$nome_episodio;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function getNome_episodio() {
    return $this->nome_episodio;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function setNo_ar($no_ar) {
  
      $this->no_ar=$no_ar;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function getNo_ar() {
    return $this->no_ar;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function setAdicionado($adicionado) {
  
      $this->adicionado=$adicionado;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function getAdicionado() {
    return $this->adicionado;
  }

  /**
   * TODO Auto-generated comment.
   */
  public function setAdicionado_by(Usuario $adicionado_by) {
      $this->adicionado_by=$adicionado_by;
      
  }

  /**
   * TODO Auto-generated comment.
   */
  public function getAdicionado_by() {
    return $this->adicionado_by;
  }
  public function setCodigo($code) {
      $this->codigo=$code;
  }
  public function info(){
      ?>
<link href="/MyHobby/css/mystyle.css" rel="stylesheet" type="text/css" />

      <div id="list-episodio" class="item col-sm-6 col-xs-6 col-md-4">
          <?php ?>
          <img class="img-responsive img-thumbnail" src="http://2.bp.blogspot.com/-OSlo4lj_H4w/VRMrRXuZWyI/AAAAAAABCNA/RQsmcuaWiEE/s1600/sem.gif" alt="...">
        <div class="carousel-caption" id="legenda">
            <a href="<?php echo $_SERVER['REQUEST_URI']."/".$this->numero_episodio;?>">
            <h3><?php echo $this->getNome_episodio();?><small><?php echo $this->getNumero_episodio();?></small></h3>
            <p><?php echo date("d/F/Y",strtotime($this->getNo_ar()) );?></p>
            </a>
        </div>
    </div>
      <?php
  }
}
