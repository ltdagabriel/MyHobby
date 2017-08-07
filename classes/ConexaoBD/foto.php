<?php
include_once getConexaoBD('conexao');
require_once getObject('foto');
class fotoC {
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    function get($arg){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM foto WHERE codigo = :code");
            $vetor=array( ":code" => $arg);
            $stmt->execute($vetor);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $foto=new Foto();
            $foto->setCodigo($row['codigo']);
            $foto->setLegenda($row['legenda']);
            $foto->setUrl($row['url']);
            return $foto;
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
}
?>