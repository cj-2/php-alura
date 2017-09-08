<?php
  require_once 'include/header.php'; ?>

<div class="container">
  <div class="row principal">
    <div class="col-md-12">
      <h1>Bem vindo ao brecho!</h1>
      <?php
      // Mensagens
      mostraAlerta();

      // Link de deslog e email do usuário
      if (verificarLogin()): ?>
        <p>Você está logado como: <?= usuarioLogado(); ?></p>
        <a href="logout.php">Sair da Conta</a>
    <?php
      endif; ?>
    </div>
      <?php if (!verificarLogin()): ?>
        <div class="col-md-6 login">
          <h2>Efetuar Login:</h2>
          <form class="" action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
            <label for="password">Senha:</label>
            <input type="password" name="password" class="form-control">
              <br>
            <button type="submit" class="btn btn-success">Login</button>
          </form>
        </div>
      <?php endif; ?>
  </div>
</div>
<?php
  include 'include/footer.php';
