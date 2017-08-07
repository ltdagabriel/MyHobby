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
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
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
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
    function get($arg){
        try {
            $where='';
            if($arg!=""){
                $where="codigo_obra = ".$arg;
            }
            $stmt = $this->pdo->prepare("SELECT distinct(codigo),nome FROM genero,listgenero WHERE codigo = codigo_genero and ".$where." ORDER BY nome ASC");
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
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
}
