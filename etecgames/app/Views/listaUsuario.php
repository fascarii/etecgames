<h3 class="display-3">Lista de usuários</h3>

<div class="table-responsive">
<table class="table">
  <thead class="table-dark">
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
                        <button type="submit" class="btn btn-secondary"> <i class="bi bi-pencil"></i></button>
                    </form>
                </td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="codUsu" value="<?php echo ($usuario->codusu) ?> ">
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>