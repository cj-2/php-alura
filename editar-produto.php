<?php
  require_once 'config.php';
  verificarUsuario();

  $ProdutoDao = new ProdutoDao($conexao);

  $ProdutoFactory = new ProdutoFactory();
  $produto = $ProdutoFactory->criarProduto($_POST['tipo_produto'], $_POST);
  $produto->atualizarProduto($_POST);
  $produto->categoria->setId($_POST['categoria_id']);

  $produto->setId($_POST['id']);

  if ($ProdutoDao->editarProduto($produto))
  {
    $_SESSION['success'] = 'Produto alterado com sucesso!';
    header('Location: lista-de-produtos.php');
    die();
  }
  else
  {
    $msg = mysqli_error($conexao);
    $_SESSION['danger'] = "Erro: {$msg}";
    header('Location: lista-de-produtos.php');
    die();
  }
