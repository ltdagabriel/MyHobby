<?php
class Comentario {
    private $codigo;
    private $data;
    private $texto;
    
    public function setCodigo($code){
        $this->codigo=$code;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }
    
    public function setData($data) {
        $this->data=$data;
    }
    
    public function getData() {
        return $this->data;
    }
    
    public function setTexto($texto) {
        $this->texto=$texto;
    }
    
    public function getTexto() {
        return $this->texto;
    }
}
