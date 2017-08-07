<?php


date_default_timezone_set('America/Sao_Paulo');
class Conexao {

    

    private $user;

    private $pass;

    private $host;

    private $base;

    private $file;

    public $pdo;


    /**
     * Valida os dados iniciando uma conexao com o banco de dados
     **/
    public function Connect() {

	try{

        $user = "root";

        $pass = "";

        $host = "localhost";

        $base = "MyHobby";



        $parametros = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"); //Definimos a conexão com o banco no padrão URF-8



        $this->file = "mysql:host=" . $host . ";dbname=" . $base;

        $this->pdo = new PDO($this->file, $user, $pass, $parametros);



        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $this->pdo->setAttribute(PDO::ATTR_PERSISTENT, true);

        if (!$this->pdo) {

            echo " Falha: ".__METHOD__." local: ".__FILE__.PHP_EOL;

        }

        return $this->pdo;

		}catch(PDOException $ex){

		echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;

		}

    }

}

?>


