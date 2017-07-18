<?php

class ViewObra_01 {
    private $imagem;
    private $genero;
    private $titulo;
    private $sinopse;
    
    public function __construct($array) {
        $this->imagem=$array[0];
        $this->genero=$array[1];
        $this->titulo=$array[2];
        $this->sinopse=$array[3];
    }
    public function getImagem() {
        return $this->imagem;
    }
    public function getGenero() {
        return $this->genero;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function getSinopse() {
        return $this->sinopse;
    }
}
