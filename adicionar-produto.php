<?php
  require_once 'config.php';
  verificarUsuario();

  $ProdutoDao = new ProdutoDao($conexao);

  $ProdutoFactory = new ProdutoFactory();
  $produto = $ProdutoFactory->criarProduto($_POST['tipo_produto'], $_POST);
  $produto->atualizarProduto($_POST);
  $produto->categoria->setId($_POST['categoria_id']);

  // If para o resultado imprimido, codição: Execução da função.
  if ($ProdutoDao->inserirProduto($produto))
  {
    $_SESSION['success'] = "Produto {$produto->getNome()} adicionado com sucesso!";
    header("Location: formulario-adicionar-produto.php");
    die();
  }
  else
  {
    $msg = mysqli_error($conexao);
    $_SESSION['danger'] = "Erro: {$msg}";
    header("Location: formulario-adicionar-produto.php");
    die();
  }
