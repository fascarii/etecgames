<form method="POST">

    <div class="mb-3">
        <label class="form-label" for="codigofornecedorinput">Código: </label>
        <input class="form-control .col-md" type="text" name="codFornAlterar" id="codigofornecedorinput" readonly value="<?php echo ($fornecedor->codForn) ?>">
    </div>
    <div>
        <label class="form-label" for="nomefornecedorinput">Nome: </label>
        <input class="form-control" type="text" name="nomeForn" id="nomefornecedorinput" value="<?php echo ($fornecedor->nomeForn) ?>">
    </div>
    <div>
        <label class="form-label" for="emailusuarioinput">Email: </label>
        <input class="form-control" type="text" name="emailForn" id="emailfornecedorinput" value="<?php echo ($fornecedor->emailForn) ?>">
    </div>
	<div>
        <label class="form-label" for="emailusuarioinput">Telefone: </label>
        <input class="form-control" type="tel" name="foneForn" id="fonefornecedorinput" value="<?php echo ($fornecedor->foneForn) ?>">
    </div>
    <div>
        <button type="submit" class="btn btn-primary mt-3">Alterar</button>
    </div>

</form>
