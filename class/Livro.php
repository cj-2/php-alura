<?php
  // abstract define que essa classe é uma abstração
  // ou seja, é usada apenas para que o ebook ou livro físico
  // herde suas métodos e atributos.
  abstract class Livro extends Produto{
    private $isbn;

    // M ISBN
    public function setIsbn($valor){ $this->isbn = $valor; }
    public function getIsbn(){ return $this->isbn; }

    public function calcImposto(){
      return $this->getPreco() * 0.16;
    }

  }
