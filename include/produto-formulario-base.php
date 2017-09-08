<tr>
  <td>Nome</td>
  <td><input type="text" class="form-control" name="nome" value="<?= $produto->getNome(); ?>" required></td>
</tr>
<tr>
  <td>Preço</td>
  <td><input type="number" class="form-control" name="preco" value="<?= $produto->getPreco(); ?>" required></td>
</tr>
<tr>
  <td>Descrição</td>
  <td><textarea class="form-control" name="descricao" rows="4" cols="80" required><?= $produto->getDescricao(); ?></textarea></td>
</tr>
<tr>
  <td>Categoria</td>
  <td>
    <select class="form-control" name="categoria_id" >
      <?php foreach ($categorias as $categoria):
        $categoria_selecionada = $produto->categoria->getId() == $categoria->getId();
        $selecao = $categoria_selecionada ? 'selected' : '';
      ?>
        <option <?= $selecao ?> value="<?= $categoria->getId(); ?>"><?= $categoria->getNome(); ?> </option>
      <?php endforeach; ?>
    </select>
  </td>
</tr>
<tr>
  <td>Tipo do Produto</td>
  <td>
    <select class="form-control" name="tipo_produto" >
      <optgroup label="Livros">

        <?php
          $tipos = ['Livro Fisico', 'Ebook'];
          foreach ($tipos as $tipo):
            // Procura por espaços e os substitui por nada.
            $tipo_tratado = str_replace (" ", "", $tipo);
            $o_tipo_do_produto = get_class($produto) == $tipo_tratado;
            $selecao = $o_tipo_do_produto ? 'selected' : '';
        ?>
          <option <?= $selecao ?> value="<?= $tipo_tratado; ?>"><?= $tipo; ?> </option>
        <?php endforeach; ?>

      </optgroup>
    </select>
  </td>
</tr>
<tr>
  <td>ISBN</td>
  <td><input type="text" name="isbn" class="form-control" value="<?php if ($produto->haveIsbn()) echo $produto->getIsbn(); ?>"></td>
</tr>
<tr>
  <td>Taxa de Impressão</td>
  <td><input type="text" name="taxa_impressao" class="form-control" value="<?php if ($produto->haveTaxaImpressao()) echo $produto->getTaxaImpressao(); ?>"></td>
</tr>
<tr>
  <td>Water Mark</td>
  <td><input type="text" name="water_mark" class="form-control" value="<?php if ($produto->haveWaterMark()) echo $produto->getWaterMark(); ?>"></td>
</tr>
