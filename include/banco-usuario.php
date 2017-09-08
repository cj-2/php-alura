<?php
  // Busca usuário e senha, caso esteja errado entrega NULL
  function buscarUsuario($conexao, $email, $senha){
    $md5_pass = md5($senha);
    $email = mysqli_real_escape_string($conexao, $email);
    $query = "select * from usuarios where email = '{$email}' and senha = '{$md5_pass}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
  }
