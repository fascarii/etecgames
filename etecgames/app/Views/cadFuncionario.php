<h3 class="display-3">Inserir Funcionário</h3>
<form method="POST">
    <div>
        <label for="codusu" class="form-label">Digite o Código do usuário</label>
        <input type="number" name="codusu" value="codusu" id="codusu" class="form-control" placeholder="Exemplo: 123">
    </div>
    <div class="col-12">
        <button type='submit' class="btn btn-primary mt-3">Buscar</button>
    </div>
</form>

<?php

$request = service('request');
$codusu = isset($usuario->codusu) ? $usuario->codusu : 0;
$emailusu = isset($usuario->emailUsu) ? $usuario->emailUsu : '';

?>

<div class="flex">
    <form method="POST">

        <div class="mb-3">

            <label for="codusu" class="form-label">Código Usuário</label>
            <input type="number" class="form-control" id="codusu" name="codusu" value="<?= $codusu?>" readonly>
        </div>

        <div class="mb-3">

            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailusu" name="emailUsu" value="<?= $emailusu ?>" aria-describedby="nomeHelp">
        </div>

        <div class="mb-3">

            <label for="fone" class="form-label">Fone</label>
            <input type="tel" class="form-control" id="foneFun" name="foneFun" aria-describedby="foneHelp">
        </div>


        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>