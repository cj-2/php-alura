<?php
  class LivroFisico extends Livro{

    private $taxaImpressao;

    public function getTaxaImpressao(){
      return $this->taxaImpressao;
    }
    public function setTaxaImpressao($taxaImpressao){
      $this->taxaImpressao = $taxaImpressao;
    }

    public function atualizarProduto($params){
        $this->setIsbn($isbn = $params['isbn']);
        $this->setTaxaImpressao($taxa_impressao = $params['taxa_impressao']);
    }

  }
