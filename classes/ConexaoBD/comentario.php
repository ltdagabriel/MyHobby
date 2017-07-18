<?php
include_once getConexaoBD('conexao');
include_once getConexaoBD('comentario');
class ComentarioC {
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    
    public function cadastrar(Comentario $coment) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Comentario(texto) VALUE (:texto)");
            $param = array(
                ":texto" => $coment->getTexto()
            );
            
            $stmt->execute($param);
            return getCode($coment->getTexto());             
        } catch (PDOException $ex) {
            echo " Error ComentarioC::cadastrar: {$ex->getMessage()} ";
        }
    }
    public function getCode($texto) {
        try {
            $stmt = $this->pdo->prepare("SELECT codigo FROM Comentario WHERE texto = :texto");
            $param = array(
                ":texto" => $texto
            );
            $stmt->execute($param); 
            
            return  $stmt->fetch(PDO::FETCH_ASSOC)['codigo'];
        } catch (PDOException $ex) {
            echo " Error ComentarioC::cadastrar: {$ex->getMessage()} ";
        }
    }
}
