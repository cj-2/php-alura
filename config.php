<?php
  // Teste de erros.
  ini_set('display_errors', 'on');

  require_once 'include/conexao.php';
  require_once 'include/logica-usuario.php';

  // criando autoloader de classes
  function carrega_classe($nome_classe){
    require_once "class/{$nome_classe}.php";
  }
  // registrando autoloader de classes
  spl_autoload_register('carrega_classe');
