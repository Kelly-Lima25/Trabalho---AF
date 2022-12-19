<?php
class ConexaoBD{
    private $url;
    private $usuario;
    private $senha;
    private $BD;

    public function __construct(){
        $this->url = "127.0.0.1";
        $this->usuario = "root";
        $this->senha = '';
        $this->BD = "BDJogo";
    }
    public function getConexaoBD(){
        return new mysqli(
            $this->url, $this->usuario, $this->senha, $this->BD
        );
    }
}