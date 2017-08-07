<?php
include_once getConexaoBD('conexao');
require_once getObject('video');
class videoC {
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    function get($arg){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM video WHERE codigo = :code");
            $vetor=array( ":code" => $arg);
            $stmt->execute($vetor);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $video=new Video();
            /** falta implementar**/
            return $video;
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
}
?>