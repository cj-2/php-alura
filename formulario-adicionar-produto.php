<?php
  require_once 'include/header.php';
  verificarUsuario();

  $CategoriaDao = new CategoriaDao($conexao);
  $categorias = $CategoriaDao->listarCategorias();

  $categoria = new Categoria();
  $categoria->setId(1);

  // Passamos vazios já que é necessario se adicionar algum valor a classe.
  $produto = new LivroFisico("", "", "", $categoria);

?>
  <div class="container">
    <div class="row principal">
      <h1>Formulário de cadastro de Produtos:</h1>
      <?php mostraAlerta(); ?>
      <form class="formulario-produto" action="adicionar-produto.php" method="post">
        <table class="table table-bordered">
          <tbody>
            <?php include 'include/produto-formulario-base.php'; ?>
            <tfoot>
              <tr>
                <td></td>
                <td><button type="submit" class="btn btn-primary">Cadastrar</button></td>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </form>
    </div>
  </div>
<?php
  include 'include/footer.php';
