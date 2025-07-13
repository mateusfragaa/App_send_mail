<?php
namespace App\Model;
class Mensagem {
    private $para;
    private $assunto;
    private $mensagem;
    private $resposta = array();

    public function __get($atrr){
        return $this->$atrr;
    }

    public function __set($atrr, $valor){
        $this->$atrr = $valor;
        return $this;
    }

    public function setResposta($status, $resposta){
        $this->resposta = [
            'status' => $status,
            'resposta' => $resposta
        ];
    }

    public function validaMensagem(){
        if (empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
            return false;
        }
        return true;
    }

}