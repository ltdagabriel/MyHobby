<?php
include_once getConexaoBD('conexao');
include_once getConexaoBD('comentario');
require_once getObject('obra');
class obraC {
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    function cadastrar(Obra $obra){
        try {
            $comentario=new ComentarioC();
            $coment=$comentario->cadastrar($obra->getComentario());
            
            
            $stmt = $this->pdo->prepare("");
            $param = array(
                ":validacao" => $obra->getValidacao(),
                ":comentario" => $coment 
            );
            
            return $stmt->execute($param);            
        } catch (PDOException $ex) {
            echo " Falha ao Cadastrar: {$ex->getMessage()} ";
        }
    }
}
