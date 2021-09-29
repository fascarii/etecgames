<form method="POST">

    <div class="mb-3">
        <label class="form-label" for="codigousuarioinput">Código: </label>
        <input class="form-control .col-md" type="text" name="codUsuAlterarCod" id="codigousuarioinput" readonly value="<?php echo ($usuario->codusu) ?>">
    </div>
    <div>
        <label class="form-label" for="emailusuarioinput">Email: </label>
        <input class="form-control" type="text" name="emailUsu" id="emailusuarioinput" value="<?php echo ($usuario->emailUsu) ?>">
    </div>
    <div>
        <button type="submit" class="btn btn-primary mt-3">Alterar</button>
    </div>

</form>
