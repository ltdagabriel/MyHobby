<?php
include_once getConexaoBD('conexao');
include_once getConexaoBD('usuario');
include_once getConexaoBD('especificacao');
require_once getObject('obra');
class obraC {
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    public function get($code) {
         try {
            $stmt = $this->pdo->prepare("SELECT * FROM obra WHERE codigo = :code");
            $param = array(
                ":code" => $code
            );
            $stmt->execute($param); 
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $obra= new Obra();
            $obra->setCodigo($row['codigo']);
            $obra->setValidacao($row['validacao']);
            $obra->setTitulo($row['titulo']);
            $obra->setTitulo_oficial($row['titulo_oficial']);
            $espec=new especificacaoC();
            $obra->setEspecificacao($espec->get($row['codigo']));
            
            
            return $obra;
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
    
    public function getCode($titulo) {
        try {
            $stmt = $this->pdo->prepare("SELECT codigo FROM Obra WHERE titulo= :titulo");
            $param = array(
                ":titulo" => $titulo
            );
            $stmt->execute($param); 
            
            return  $stmt->fetch(PDO::FETCH_ASSOC)['codigo'];
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
    function cadastrar(Obra $obra){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Obra(adicionado_by,titulo,titulo_oficial) VALUE (:user,:titulo,:titulo_oficial)");
            $param = array(
                ":user" => $obra->getAdicionado_by()->getCodigo(),
                ":titulo" => $obra->getTitulo(),
                ":titulo_oficial" => $obra->getTitulo_oficial()
            );
            $stmt->execute($param);
            return getCode($obra->getTitulo());            
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
}
