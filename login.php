<?php
  require_once 'config.php';
  require_once 'include/banco-usuario.php';

  $usuario = buscarUsuario($conexao, $_POST['email'], $_POST['password']);
  if($usuario == null){
    $_SESSION['danger'] = 'Senha ou usuário incorreto!';
    header("Location: index.php");
    die();
  }else {
    logarUsuario($usuario['email']);
    $_SESSION['success'] = 'Logado com sucesso!';
    header("Location: index.php");
    die();
  }
