<?php
  class Categoria{
    private $id;
    private $nome;

    // M Id
    public function setId($valor){ $this->id = $valor; }
    public function getId(){ return $this->id; }

    // M Nome
    public function setNome($valor){ $this->nome = $valor; }
    public function getNome(){ return $this->nome; }

  }
