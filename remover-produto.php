<?php
  require_once 'config.php';
  verificarUsuario();
  $ProdutoDao = new ProdutoDao($conexao);

  $id = $_POST['id'];
  $ProdutoDao->removerProduto($id);

  // Sempre depois de um Location tem que haver um die();
  $_SESSION['success'] = "Produto removido com sucesso!";
  header('Location: lista-de-produtos.php');
  die();
