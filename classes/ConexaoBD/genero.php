<?php
include_once getConexaoBD('conexao');
require_once getObject('genero');
class generoC {
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    public function getCode($nome) {
        try {
            $stmt = $this->pdo->prepare("SELECT codigo FROM Genero WHERE nome= :nome");
            $param = array(
                ":nome" => $nome
            );
            $stmt->execute($param); 
            
            return  $stmt->fetch(PDO::FETCH_ASSOC)['codigo'];
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ";
        }
    }
    function cadastrar(Genero $genero){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Genero(nome) VALUE (:nome)");
            $param = array(
                ":nome" => $genero->getNome()
            );
            $stmt->execute($param);
            return getCode($genero->getNome());            
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ";
        }
    }
    function getAll(){
        try {
            $stmt = $this->pdo->prepare("SELECT codigo,nome FROM genero");
            $vetor=array();
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $genero=new Genero();
                $genero->setCodigo($row['codigo']);
                $genero->setNome($row['nome']);
                array_push($vetor, $genero);
            }
            return $vetor;
        } catch (PDOException $ex) {
            echo " Falha ao Retornar obra : {$ex->getMessage()} \n";
        }
    }
}
