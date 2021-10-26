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

            $FuncionarioModelo->set('codusu_FK', $request->getPost('codusu'));
            $FuncionarioModelo->set('nomeFun', $request->getPost('nomeFun'));
            $FuncionarioModelo->set('foneFun', $request->getPost('foneFun'));


            if ($FuncionarioModelo->insert()) {
                $data['msg'] = "Informações cadastradas com sucesso";
            } else {
                $data['msg'] = "Informações não cadastradas";
            }
        }
    }

    public function buscaPrincipalFuncionarioCod()
    {
        $request  = service('request');
        $UsuarioModel = new \App\Models\FuncionarioModel();
        $codfun = $request->getPost('codFun');
        $registros = $UsuarioModel->find($codfun);



        $codfun = $request->getPost('codFun');
        $codfunAlterar = $request->getPost('codFunAlterarCod');

        if ($request->getPost('codFunDeletar')) {
            $this->funcionarioExcuir($request->getPost('codFunDeletar'));
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }

        if ($request->getPost('codFunAlterarCod')) {
            return $this->funcionarioAlterar();
        }

        $data['funcionario'] = $registros;

        echo view('header');
        echo view('buscaCodFuncionario', $data);
        echo view('footer');
    }

    // apenas para cadastro do funcionário
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

        if ($request->getPost('nomeFun') && $request->getPost('foneFun')) {
            $this->inserirFuncionario();
        }

        echo view('header');
        echo view('cadFuncionario', $data);
        echo view('footer');
    }

    //excluir, alterar

    public function funcionarioAlterar()
    {
        $request  = service('request');
        $codfunAlterar = $request->getPost('codFunAlterar');
        $nomefun = $request->getPost('nomeFun');
        $fonefun = $request->getPost('foneFun');



        $FuncionarioModel = new \App\Models\FuncionarioModel();
        $registros = $FuncionarioModel->find($codfunAlterar);
        $data ['funcionario'] = $registros;


        if ($request->getPost('nomeFun') && $request->getPost('foneFun')) {
            $registros->nomeFun = $nomefun;
            $registros->foneFun = $fonefun;
            $FuncionarioModel->update($codfunAlterar, $registros);

            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }

        echo view('header');
        echo view('alterarFormUsuario', $data);
        echo view('footer');
    }

    public function funcionarioExcuir()
    {
        $request = service('request');
        $codFunDeletar = $request->getPost('codFun');

        if (is_null($codFunDeletar)) {
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }

        $FuncionarioModel = new \App\Models\UsuarioModel();
        if ($FuncionarioModel->delete($codFunDeletar)) {
            //return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        } else {
            //return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }
    }
}
