<?php
  session_start();
  function logarUsuario($email){
    $_SESSION['usuario_logado'] = $email;
  }

  function logout(){
    // unset($_SESSION["usuario_logado"]));
    session_destroy();
    session_start();
  }

  function verificarLogin(){
    if (isset($_SESSION["usuario_logado"])) {
      return 1;
    } else {
      return 0;
    }
  }

  function verificarUsuario(){
    if (!verificarLogin()){
      $_SESSION['danger'] = 'Você não tem acesso a essa função!';
      header("Location: index.php");
      die();
    }
  }

  function usuarioLogado(){
    return $_SESSION["usuario_logado"];
  }

  function alerta($tipo){
    if (isset($_SESSION[$tipo])): ?>
      <p class="alert-<?= $tipo; ?>"><?= $_SESSION[$tipo]; ?></p>
    <?php
      unset($_SESSION[$tipo]);
    endif;
  }
  function mostraAlerta(){
    alerta('success');
    alerta('danger');
  }
