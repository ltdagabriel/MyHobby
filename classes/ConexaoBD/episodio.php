<?php
include_once getConexaoBD('conexao');
include_once getConexaoBD('video');
require_once getObject('episodio');
class EpisodioC {
    private $con;
    private $pdo;
    
    function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    
    function get($arg){
        try {
            $where='';
            if($arg!=""){
                $where="codigo = ".$arg;
            }
            $stmt = $this->pdo->prepare("SELECT * FROM episodio,listepisodio WHERE codigo = codigo_episodio and ".$where." ORDER BY lancado DESC");
            $vetor=array();
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $episodio=new Episodio();
                $episodio->setCodigo($row['codigo']);
                $video=new videoC();
                $episodio->setVideo($video->get($row['codigo_video']));
                $episodio->setNumero_episodio($row['numero_episodio']);
                $episodio->setNo_ar($row['lancado']);
                $episodio->setAdicionado($row['data_update']);
                $episodio->setNome_episodio($row['nome_episodio']);
                array_push($vetor, $episodio);
            }
            return $vetor;
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
}
