<?php
/**
 *  Classe adiquirida a partir do site
 *  url: https://php.eduardokraus.com/trabalhando-com-url-amigavel-no-php
 *  Postado por Eduardo Kraus em 07 de Março de 2012   
 **/
class Url
{
    private static $url = null;
    private static $baseUrl = null;
    
    public static function getURL( $id )
    {
        if( self::$url == null )
        // Verifica se a lista de URL j� foi preenchida
            self::getURLList();
        
        // Valida se existe o ID informado e retorna.
        if( isset( self::$url[ $id ] ) )
            return self::$url[ $id ];
        
        // Caso não exista o ID, retorna nulo
        return null;
    }
    
    public static function getBase()
    {
        if( self::$baseUrl != null )
            return self::$baseUrl;

        global $_SERVER;
        $startUrl = strlen( $_SERVER["DOCUMENT_ROOT"] );
        $excludeUrl = substr( $_SERVER["SCRIPT_FILENAME"], $startUrl, -9 );
        if( $excludeUrl[0] == "/" )
            self::$baseUrl = $excludeUrl; 
        else
            self::$baseUrl = "/" . $excludeUrl;
        return self::$baseUrl;
    }
    
    private static function getURLList()
    {
        global $_SERVER;
        
        // Primeiro traz todos as pastas abaixo do index.php
        $startUrl = strlen( $_SERVER["DOCUMENT_ROOT"] ) -1;
        $excludeUrl = substr( $_SERVER["SCRIPT_FILENAME"], $startUrl, -10 );
        
        // a vari�vel$request possui toda a string da URL ap�s o dom�nio.
        $request = $_SERVER['REQUEST_URI'];
        
        // Agora retira toda as pastas abaixo da pasta raiz
        $request = substr( $request, strlen( $excludeUrl ) );
        
        // Explode a URL para pegar retirar tudo ap�s o ?
        $urlTmp = explode("?", $request);
        $request = $urlTmp[ 0 ];
        
        // Exemplo a URL para pegar cada uma das partes da URL
        $urlExplodida = explode("/", $request);
        
        $retorna = array();

        for($a = 0; $a <= count($urlExplodida); $a ++)
        {
            if(isset($urlExplodida[$a]) AND $urlExplodida[$a] != "")
            {
                array_push($retorna, $urlExplodida[$a]);
            }
        }
        self::$url = $retorna;
    }
}
function getObject($param){
    return "classes/Object/".$param.".php";
}
function getInterface($param){
    return "classes/Interface/".$param.".php";
}
function getConexaoBD($param){
    return "classes/ConexaoBD/".$param.".php";
}
function sanitize($param){
    $string=$param;
    $string = iconv( "UTF-8" , "ASCII//TRANSLIT//IGNORE" , $string );
    $string = preg_replace( array( '/[ ]/' , '/[^A-Za-z0-9\-]/' ) , array( '' , '' ) , $string );
    return $string;
}
function arruma($texto){
    return  mb_convert_case(strtr($texto,array( "_" =>" ")), MB_CASE_TITLE, "UTF-8");
}
class Project{
	private $projctname;
	
		public function __construct(){
		$this->projctname="My Hobby";
		}
		public function getName(){
		return $this->projctname;
		}
		
}
$projeto=new Project();
?>
