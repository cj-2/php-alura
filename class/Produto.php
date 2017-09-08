<?php
  // Caso a classe tenha algum abstract ela deve se tornar abstrata.
  abstract class Produto {

    // Parâmetros
    private $id;
    private $nome;
    private $preco;
    private $descicao;
    public  $categoria; // Objeto Categoria

    // Categoria no caso tipa a obrigação de $categoria receber um objeto Categoria
    // e valores serem passados.
    function __construct($nome, $preco, $descicao, Categoria $categoria){
      $this->nome = $nome;
      $this->preco = $preco;
      $this->descricao = $descicao;
      $this->categoria = $categoria;
    }

    // Métodos
    public function descontoProduto($desconto){
      if ($desconto > 0 && $desconto <= 0.5) {
        return $this->preco - ($this->preco * $desconto);
      }
    }

    // M Id
    public function setId($valor){ $this->id = $valor; }
    public function getId(){ return $this->id; }

    // M Nome
    // public function setNome($valor){ $this->nome = $valor; }
    public function getNome(){ return $this->nome; }

    // M Preço
    // public function setPreco($valor){
    //   if ($valor > 0) {
    //     $this->preco = $valor;
    //   }
    // }
    public function getPreco(){ return $this->preco; }

    // M Descrição
    // public function setDescricao($valor){ $this->descricao = $valor; }
    public function getDescricao(){ return $this->descricao; }

    // M Categoria
    // public function setCategoria($valor){ $this->categoria = $valor; }
    public function getCategoria(){ return $this->categoria; }

    public function haveIsbn(){
      return $this instanceof Livro;
    }

    public function haveTaxaImpressao(){
      return $this instanceof LivroFisico;
    }

    public function haveWaterMark(){
      return $this instanceof Ebook;
    }

    // Obriga as filhas terem esse método.
    abstract function atualizarProduto($params);

    public function calcImposto(){
      return $this->preco * 0.2;
    }

    // toString é chamado quando se tenta imprimir um Objeto.
    function __toString(){
      return "{$this->nome}: R$ {$this->preco}";
    }

    // Executa do objeto for destruido.
    function __destruct(){
      # Alguma ação
    }


}
