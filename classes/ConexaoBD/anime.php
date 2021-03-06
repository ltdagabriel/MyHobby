<?php
include_once getObject('anime');
include_once getConexaoBD('obra');
include_once getConexaoBD('episodio');
class AnimeC {
     function __construct() {
        $this->con = new Conexao();
        $this->pdo = $this->con->Connect();
    }
    function get($code) {
         try {
            $stmt = $this->pdo->prepare("SELECT * FROM anime WHERE codigo = :code");
            $param = array(
                ":code" => $code
            );
            $stmt->execute($param); 
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $obra=new obraC();
            $anime= new Anime($obra->get($row['codigo']));
            $anime->setNumero_temporada($row['numero_temporada']);
            $anime->setLancamento_anime($row['lancamento']);
            $episodio=new EpisodioC();
            $anime->setEpisodio($episodio->get($row['codigo']));
            
            return $anime;
        } catch (PDOException $ex) {
            echo " Falha: ".__METHOD__." local: ".__FILE__." {$ex->getMessage()} ".PHP_EOL;
        }
    }
    
}
