<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/dev.css">
    <title>Loja</title>
  </head>
  <body>
    <?php
      require_once 'config.php';
     ?>
    <main>
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <a href="index.php" class="navbar-brand">Minha própria Loja</a>
          </div>
          <div>
            <ul class="nav navbar-nav">
              <li><a href="formulario-adicionar-produto.php">Adicionar Produto</a></li>
              <li><a href="lista-de-produtos.php">Produtos</a></li>
              <li><a href="contato.php">Contato</a></li>
            </ul>
          </div>
        </div>
      </div>
