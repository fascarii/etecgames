<?php

namespace App\Controllers;

class FuncionarioController extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('cadFuncionario');
        echo view('footer');
    }

    public function inserirFuncionario()
    {
        $data['msg'] = '';

        $request = service('request');

        if ($request->getMethod() === 'post') {
            $FuncionarioModelo = new \App\Models\FuncionarioModel();

            $FuncionarioModelo->set('codusu_FK', $request->getPost('codusu_FK'));
            $FuncionarioModelo->set('nomeFun', $request->getPost('nomeFun'));
            $FuncionarioModelo->set('foneFun', $request->getPost('foneFun'));


            if ($FuncionarioModelo->insert()) {
                $data['msg'] = "Informações cadastradas com sucesso";
            } else {
                $data['msg'] = "Informações não cadastradas";
            }
        }
    }

    public function listaCodFuncionario()
    {
        $request  = service('request');
        $data['usuario'] = "";

        if ($request->getPost('codusu')) {
            $codusu = $request->getPost('codusu');
            $UsuarioModel = new \App\Models\UsuarioModel();
            $registros = $UsuarioModel->find($codusu);
            $data['usuario'] = $registros;
        }




        echo view('header');
        var_dump($registros);
        echo view('cadFuncionario', $data);
        echo view('footer');
    }
}
