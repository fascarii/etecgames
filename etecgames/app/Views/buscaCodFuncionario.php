<div class="container">

    <div class="row justify-content-center">

        <div class="col-9">
            <h3 class="display-3">Busca funcionário por código</h3>
            <br>
            <h5>Para cadastrar um funcionário, primeiro verifique se há um usuário</h5>
            <form method="POST">
                <div>
                    <label for="codFun" class="form-label">Digite o Código do Funcionario</label>
                    <input type="number" name="codFun" value="codFun" id="codFun" class="form-control" placeholder="Exemplo: 123">
                </div>
                <div class="col-12">
                    <button type='submit' class="btn btn-primary mt-3">Buscar</button>
                </div>
            </form>

            <?php

            $request = service('request');
            $codFunAlterar = isset($funcionario->codFun) ? $funcionario->codFun : 0;
            $nomefun = isset($funcionario->nomeFun) ? $funcionario->nomeFun : '';
            $fonefun = isset($funcionario->foneFun) ? $funcionario->foneFun : '';

            if ($codFunAlterar) {

            ?>

                <div class="flex">
                    <form method="POST">

                        <div class="mb-3">

                            <label for="email" class="form-label">Cod funcionario</label>
                            <input type="text" class="form-control" id="codFun" name="codFunAlterar" value="<?= $codFunAlterar ?>" aria-describedby="nomeHelp" >
                        </div>

                        <div class="mb-3">

                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nomeFun" name="nomeFun" required value="<?= $nomefun ?>" aria-describedby="nomeHelp">
                        </div>

                        <div class="mb-3">

                            <label for="fone" class="form-label">Fone</label>
                            <input type="tel" class="form-control" id="foneFun" name="foneFun" value="<?= $fonefun ?>" required aria-describedby="foneHelp">
                        </div>


                        <button type="submit" class="btn btn-secondary">Alterar</button>
                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                <?php } ?>
                </div>

        </div>
    </div>
</div>