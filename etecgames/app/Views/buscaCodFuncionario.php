<div class="container">

    <div class="row justify-content-center">

        <div class="col-9">

            <h3 class="display-3">Busca funcionário por código</h3>
            <br>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Busca por código
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form method="POST">
                                <div>
                                    <label for="codFun" class="form-label">Digite o Código do Funcionário:
                                    </label>
                                    <input type="number" name="codFun" value="codFun" id="codFun" class="form-control" placeholder="Exemplo: 123">
                                </div>
                                <div class="col-12">
                                    <button type='submit' class="btn btn-primary mt-3">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Busca por nome
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form method="POST">
                                <div>
                                    <label for="codFun" class="form-label">Digite o nome do Funcionário:
                                    </label>
                                    <input type="text" name="nomeFun" id="nomeFun" class="form-control" placeholder="Exemplo: João Jones">
                                </div>
                                <div class="col-12">
                                    <button type='submit' class="btn btn-primary mt-3">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



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
                                <input type="text" class="form-control" id="codFun" name="codFunAlterar" value="<?= $codFunAlterar ?>" aria-describedby="nomeHelp">
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
                    <?php }
                    $nomefun = isset($funcionario->nomeFun) ? $funcionario->nomeFun : '';
                    ?>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Código</th>
                                <th>Email</th>
                                <th>Alterar</th>
                                <th>Deletar</th>
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
                                        <button type="submit" class="btn btn-secondary"> <i class="bi bi-pencil"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="codUsu" value="<?php echo ($codusu) ?> ">
                                        <button type="submit" class="btn btn-danger"> <i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    </div>

            </div>
        </div>
    </div>