<?php
  class ProdutoDao{
    private $conexao;

    function __construct($conexao){
      $this->conexao = $conexao;
    }

    function inserirProduto($produto){
      $nome = $produto->getNome();
      $preco = $produto->getPreco();
      $descricao = $produto->getDescricao();
      $categoria_id = $produto->categoria->getId();
      $tipo_produto = get_class($produto);
      $isbn = "";
      $water_mark = "";
      $taxa_impressao = "";

      if ($produto->haveIsbn()) {
        $isbn = $produto->getIsbn();
      }
      if ($produto->haveWaterMark()) {
        $water_mark = $produto->getWaterMark();
      }
      else if ($produto->haveTaxaImpressao()) {
        $taxa_impressao = $produto->getTaxaImpressao();
      }

      $query = "insert into produtos (nome, preco, descricao, categoria_id, tipo_produto, isbn, water_mark, taxa_impressao) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, '{$tipo_produto}', '{$isbn}', '{$water_mark}', '{$taxa_impressao}');";
      return mysqli_query($this->conexao, $query);
    }

    function editarProduto($produto){
      $id = $produto->getId();

      $nome = $produto->getNome();
      $preco = $produto->getPreco();
      $descricao = $produto->getDescricao();
      $categoria_id = $produto->categoria->getId();
      $tipo_produto = get_class($produto);
      $isbn = "";
      $water_mark = "";
      $taxa_impressao = "";

      if ($produto->haveIsbn()) {
        $isbn = $produto->getIsbn();
      }
      if ($produto->haveWaterMark()) {
        $water_mark = $produto->getWaterMark();
      }
      else if ($produto->haveTaxaImpressao()) {
        $taxa_impressao = $produto->getTaxaImpressao();
      }

      $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, tipo_produto = '{$tipo_produto}', isbn = '{$isbn}', water_mark = '{$water_mark}', taxa_impressao = '{$taxa_impressao}' where id = {$id};";
      return mysqli_query($this->conexao, $query);
    }

    function listarProdutos(){
      $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id;";
      $resultado = mysqli_query($this->conexao, $query);

      $produtos = [];
      // mysqli_fetch_assoc imprime linhas em sequência do nossa consulta.
      while ($produto_array = mysqli_fetch_assoc($resultado)) {

        $ProdutoFactory = new ProdutoFactory();
        $produto = $ProdutoFactory->criarProduto($produto_array['tipo_produto'], $produto_array);
        $produto->atualizarProduto($produto_array);
        $produto->categoria->setNome($produto_array['categoria_nome']);
        $produto->setId($produto_array['id']);

        array_push($produtos, $produto);
      }
      return $produtos;
    }

    function buscarProduto($id){
      $query = "select * from produtos where id = {$id};";
      $resultado = mysqli_query($this->conexao, $query);
      $produto_array = mysqli_fetch_assoc($resultado);

      $ProdutoFactory = new ProdutoFactory();
      $produto = $ProdutoFactory->criarProduto($produto_array['tipo_produto'], $produto_array);
      $produto->atualizarProduto($produto_array);

      $produto->categoria->setId($produto_array['categoria_id']);
      $produto->setId($produto_array['id']);

      return $produto;
    }

    function removerProduto( $id){
      $query = "delete from produtos where id = {$id};";
      mysqli_query($this->conexao, $query);
    }



  }
