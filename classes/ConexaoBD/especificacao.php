<?php
include_once getConexaoBD('conexao');
include_once getConexaoBD('estudio');
include_once getConexaoBD('foto');
require_once getObject('especificacao');
class especificacaoC {
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    function get($code) {
         try {
            $stmt = $this->pdo->prepare("SELECT * FROM especificacao WHERE codigo_obra = :code");
            $param = array(
                ":code" => $code
            );
            $stmt->execute($param); 
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $espec=new Especificacao();
            $estudio=new estudioC();
            $espec->setEstudio($estudio->get($row['estudio']));
            $espec->setSinopse($row['sinopse']);
            $espec->setLancamento($row['lancamento']);
            $espec->setCodigo($row['codigo_obra']);
            $foto=new fotoC();
            $espec->setImagem($foto->get($row['imagem']));
            $genero=new generoC();
            $espec->setGenero($genero->get($row['codigo_obra'])) ;
            
            
            return $espec;
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
   
}
