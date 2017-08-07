<?php
include_once getConexaoBD('conexao');
include_once getObject('usuario');
class UsuarioC {
    
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    
    public function cadastrar(Usuario $user) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO usuario(login,password) VALUE (:login ,:senha)");
            $param = array(
                ":login" => $user->getLogin(),
                ":senha" => $user->getSenha()
            );
            
            $stmt->execute($param);
            return getCode($user->getLogin());             
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
    public function getCode($login) {
        try {
            $stmt = $this->pdo->prepare("SELECT codigo FROM usuario WHERE login= :login");
            $param = array(
                ":login" => $login
            );
            $stmt->execute($param); 
            
            return  $stmt->fetch(PDO::FETCH_ASSOC)['codigo'];
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
}
