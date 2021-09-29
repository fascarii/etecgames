<table class="table">
    <thead>
        <th>Código</th>
        <th>Email</th>
		
        <th>Alterar</th>
        <th>Excluir</th>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?php echo ($usuario->codusu) ?> </td>
                <td><?php echo ($usuario->emailUsu) ?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="codUsuAlterarCod" readonly value="<?php echo ($usuario->codusu) ?> ">
                        <button type="submit" class="btn btn-secondary">Alterar <i class="bi bi-pencil"></i></button>
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="codUsu" value="<?php echo ($usuario->codusu) ?> ">
                        <button type="submit" class="btn btn-danger">Deletar<i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>