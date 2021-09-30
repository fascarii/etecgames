<form method="POST">
    <div>
        <label for="codForn" class="form-label">Digite o Código do Fornecedor</label>
        <input type="number" name="codFornBusca" id="codforBusca" class="form-control" placeholder="Exemplo: 123">
    </div>
    <div class="col-12">
        <button type='submit' class="btn btn-primary mt-3">Buscar</button>
    </div>
</form>
<table class="table mt-5">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Alterar</th>
            <th scope="col">Deletar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $codForn = isset($fornecedor->codForn) ? $fornecedor->codForn : "";
        $nomeForn = isset($fornecedor->nomeForn) ? $fornecedor->nomeForn : "";
        ?>


        <tr>
            <td><?php echo ($codForn) ?> </td>
            <td><?php echo ($nomeForn) ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codFornAlterar" value="<?php echo ($codForn) ?> ">
                    <button type="submit" class="btn btn-secondary">Alterar <i class="bi bi-pencil"></i></button>
                </form>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codFornDel" value="<?php echo ($codForn) ?> ">
                    <button type="submit" class="btn btn-danger">Deletar <i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>

    </tbody>
</table>