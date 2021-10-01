<h3 class="display-3">Lista de Fornecedores</h3>

<table class="table">
    <thead>
        <th>Código</th>
        <th>Nome</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </thead>
    <tbody>
        <?php foreach ($fornecedores as $fornecedor) : ?>
            <tr>
                <td><?php echo ($fornecedor->codForn) ?> </td>
                <td><?php echo ($fornecedor->nomeForn) ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="codFornAlterar" readonly value="<?php echo ($fornecedor->codForn) ?> ">
                        <button type="submit" class="btn btn-secondary">Alterar <i class="bi bi-pencil"></i></button>
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="codFornDel" value="<?php echo ($fornecedor->codForn) ?> ">
                        <button type="submit" class="btn btn-danger">Deletar<i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>