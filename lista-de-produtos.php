<?php
  require_once 'include/header.php';
  $ProdutoDao = new ProdutoDao($conexao);

?>
  <div class="container principal">
    <h1>Formulário de cadastro de Produtos:</h1>
    <?php mostraAlerta(); ?>
    <table class="table table-striped table-bordered formulario-produto">
      <thead>
        <tr>
          <td>Nome do produto:</td>
          <td>Descrição:</td>
          <td>Preço:</td>
          <td>Imposto:</td>
          <td>Categoria:</td>
          <td>Tipo:</td>
          <td>ISBN:</td>
          <td>Taxa de Impressão:</td>
          <td>Water Mark:</td>
          <td>Ação:</td>
          <td></td>
        </tr>
      </thead>
      <?php
        $produtos = $ProdutoDao->listarProdutos();
        foreach($produtos as $produto): ?>
          <tr>
            <td><?php echo $produto->getNome(); ?></td>
            <td><?= substr($produto->getDescricao(), 0, 40) ?></td>
            <td><?= $produto->getPreco(); ?></td>
            <td><?= $produto->calcImposto(); ?></td>
            <td><?= $produto->categoria->getNome(); ?></td>
            <td><?= get_class($produto); ?></td>
            <td>
              <?php
                if ($produto->haveIsbn()) {
                  echo $produto->getIsbn();
                } ?>
            </td>
            <td>
              <?php
                if ($produto->haveTaxaImpressao()) {
                  echo $produto->getTaxaImpressao();
                } ?>
            </td>
            <td>
              <?php
                if ($produto->haveWaterMark()) {
                  echo $produto->getWaterMark();
                } ?>
            </td>
            <td>
              <form action="remover-produto.php" method="post">
                <input type="hidden" name="id" value="<?= $produto->getId();?>">
                <button class="btn btn-danger">Remover</button>
              </form>
            </td>
            <td>
              <a href="formulario-editar-produto.php?id=<?= $produto->getId()?>" class="btn btn-primary">Editar</a>
            </td>
          </tr>
        <?php endforeach; ?>
    </table>
  </div>
<?php include 'include/footer.php' ?>
