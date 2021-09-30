<form method="POST">
    <div>
        <label for="codusu" class="form-label">Digite o Código do usuário</label>
        <input type="number" name="codusu" id="codusu" class="form-control" placeholder="Exemplo: 123">
    </div>
    <div class="col-12">
        <button type='submit' class="btn btn-primary mt-3">Buscar</button>
    </div>
</form>
<table class="table">
    <thead class="thead-dark">
        <tr>
		<th>Código</th>
        <th>Email</th>
		</tr>
    </thead>
    <tbody>
        <?php
        $codusu = isset($usuario->codusu) ? $usuario->codusu : "";
        $emailUsu = isset($usuario->emailUsu) ? $usuario->emailUsu : "";
        ?>


        <tr>
            <td><?php echo ($codusu) ?> </td>
            <td><?php echo ($emailUsu) ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codUsuAlterarCod" value="<?php echo ($codusu) ?> ">
                    <button type="submit" class="btn btn-secondary">Alterar <i class="bi bi-pencil"></i></button>
                </form>
            </td>
            <td>
                <form method="POST">
                    <input type="hidden" name="codUsu" value="<?php echo ($codusu) ?> ">
                    <button type="submit" class="btn btn-danger">Deletar <i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>

    </tbody>
</table>