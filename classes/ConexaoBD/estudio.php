<?php
include_once getConexaoBD('conexao');
require_once getObject('estudio');
class estudioC {
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    function get($code) {
         try {
            $stmt = $this->pdo->prepare("SELECT * FROM estudio WHERE codigo = :code");
            $param = array(
                ":code" => $code
            );
            $stmt->execute($param); 
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $estudio=new Estudio();
            $estudio->setCodigo($row['codigo']);
            $estudio->setNome($row['nome']);
            
            return $estudio;
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
   
}
