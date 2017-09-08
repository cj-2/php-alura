<?php
  class Ebook extends Livro{

    private $waterMark;

    public function getWaterMark(){
      return $this->waterMark;
    }
    public function setWaterMark($waterMark){
      $this->waterMark = $waterMark;
    }

    public function atualizarProduto($params){
        $this->setIsbn($isbn = $params['isbn']);
        $this->setWaterMark($water_mark = $params['water_mark']);
    }

  }
