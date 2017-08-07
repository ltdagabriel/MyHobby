<?php
include_once getObject('anime');
include_once getConexaoBD('obra');
class Light_novelC {
     function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    function get($code) {
         try {
            $stmt = $this->pdo->prepare("SELECT * FROM light_novel WHERE codigo = :code");
            $param = array(
                ":code" => $code
            );
            $stmt->execute($param); 
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            
            
            return ($row)?true:false;
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
    
}
