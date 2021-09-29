<?php

namespace App\Controllers;

class UsuarioController extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('cadUsuario');
        echo view('footer');
    }

    public function inserirUsuario()
    {
        $data['msg'] = '';

        $request = service('request');

        if ($request->getMethod() === 'post') {
            $UsuarioModelo = new \App\Models\UsuarioModel();

            $opcao = ['cost' => 8];
            $senhaCrip = password_hash($request->getPost('SenhaUsu'), PASSWORD_BCRYPT, $opcao);

            $UsuarioModelo->set('emailUsu', $request->getPost('emailUsu'));
            $UsuarioModelo->set('SenhaUsu', $senhaCrip);

            if ($UsuarioModelo->insert()) {
                $data['msg'] = "Informações cadastradas com sucesso";
            } else {
                $data['msg'] = "Informações não cadastradas";
            }
        }

        echo view('header');
        echo view('cadUsuario', $data);
        echo view('footer');
    }

    public function alterarUsuario()
    {
        $request  = service('request');
        $emailUsu = $request->getPost('emailUsu');
        $codUsuAlterarFim = $request->getPost('codUsuAlterarCod');


        $UsuarioModel = new \App\Models\UsuarioModel();
        $registros = $UsuarioModel->find($codUsuAlterarFim);


        $emailUsu = $request->getPost('emailUsu');

        if ($emailUsu) {
            $registros->emailUsu = $emailUsu;

            if ($UsuarioModel->update($codUsuAlterarFim, $registros)) {
                return redirect()->to(base_url('UsuarioController/todosUsuarios'));
            } else {
                return redirect()->to(base_url('UsuarioController/todosUsuarios'));
            }
        }
        $data['usuario'] = $registros;
        echo view('header');
        echo view('alterarFormUsuario', $data);
        echo view('footer');
    }



    public function formAlterar()
    {
        # code...
    }




    public function deletarUsuario($codusuario = null)
    {
        $request = service('request');
        $codusuario = $request->getPost('codUsu');

        if (is_null($codusuario)) {
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }

        $UsuarioModel = new \App\Models\UsuarioModel();
        if ($UsuarioModel->delete($codusuario)) {
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        } else {
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }
    }

    public function todosUsuarios()
    {
        $UsuarioModel = new \App\Models\UsuarioModel();
        $registros = $UsuarioModel->find();
        $data['usuarios'] = $registros;

        $request  = service('request');
        $codusuario = $request->getPost('codUsu');
        $codUsuAlterar = $request->getPost('codUsuAlterarCod');

        if ($codusuario) {
            $this->deletarUsuario($codusuario);
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }

        if ($codUsuAlterar) {
            return $this->alterarUsuario($codUsuAlterar);
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }



        echo view('header');
        echo view('listaUsuario', $data);
        echo view('footer');
    }

    public function listaCodUsuario()
    {
        $request  = service('request');
        $UsuarioModel = new \App\Models\UsuarioModel();
        $codusu = $request -> getPost('codusu');
        $registros = $UsuarioModel->find($codusu);
        $data['usuario'] = $registros;

        
        $codusuario = $request->getPost('codUsu');
        $codUsuAlterar = $request->getPost('codUsuAlterarCod');

        if ($request->getPost('codUsu')) {
            $this->deletarUsuario($codusuario);
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }

        if ($request->getPost('codUsuAlterarCod')) {
            return $this->alterarUsuario($codUsuAlterar);
            return redirect()->to(base_url('UsuarioController/todosUsuarios'));
        }



        echo view('header');
        echo view('listaCodUsu', $data);
        echo view('footer');
    }
}
