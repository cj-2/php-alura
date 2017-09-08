<?php
  class ProdutoFactory{
    private $classes = ['LivroFisico', 'Ebook'];

    public function criarProduto($qual_tipo_produto, $params){

      $nome = $params['nome'];
      $preco = $params['preco'];
      $descricao = $params['descricao'];
      $categoria = new Categoria();
      $tipo_produto = $params['tipo_produto'];
      $isbn = $params['isbn'];
      $taxa_impressao = $params['taxa_impressao'];
      $water_mark = $params['water_mark'];

      if (in_array($qual_tipo_produto, $this->classes)) {
        return $produto = new $qual_tipo_produto($nome, $preco, $descricao, $categoria);
      }
      else {
        return $produto = new LivroFisico($nome, $preco, $descricao, $categoria);
      }
    }

  }
