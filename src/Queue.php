<?php

namespace Dojo;

class Queue
{
    public $fila;

    protected $inicio = 0;

    protected $fim = 0;

    public function adicionar($dados)
    {
        $this->fila[$this->fim++] = $dados; 
        return true;
    }

    public function remover()
    {
        if ($this->inicio === $this->fim) {
            return false;
        }

        $dados = $this->fila[$this->inicio];
        unset($this->fila[$this->inicio]);
        $this->inicio++;
        return $dados;

    }
}
