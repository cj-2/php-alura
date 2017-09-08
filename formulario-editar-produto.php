<?php
  require_once 'include/header.php';
  verificarUsuario();

  $ProdutoDao = new ProdutoDao($conexao);
  $CategoriaDao = new CategoriaDao($conexao);


  $id = $_GET['id'];
  $produto = $ProdutoDao->buscarProduto($id);
  $categorias = $CategoriaDao->listarCategorias();
?>
  <div class="container">
    <div class="row principal">
      <h1>Formulário de edição de Produto:</h1>
      <form class="formulario-produto" action="editar-produto.php" method="post">
        <table class="table table-bordered">
          <tbody>
            <?php include 'include/produto-formulario-base.php'; ?>
            <tfoot>
              <tr>
                <td></td>
                <input type="hidden" name="id" value="<?= $id; ?>">
                <td><button type="submit" class="btn btn-primary">Editar</button></td>
              </tr>
            </tfoot>
          </tbody>
        </table>
      </form>
    </div>
  </div>
<?php include 'include/footer.php'; ?>
