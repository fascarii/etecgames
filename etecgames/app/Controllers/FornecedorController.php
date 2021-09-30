<?php

namespace App\Controllers;

class FornecedorController extends BaseController
{

    public function index()
    {
        echo view('header');
        echo view('cadFornecedor');
        echo view('footer');
    }

    public function inserirFornecedor()
    {
        $data['msg'] = '';

        $request = service('request');

        if ($request->getMethod() === 'post') {
            $FornecedorModelo = new \App\Models\FornecedorModel();


            $FornecedorModelo->set('nomeForn', $request->getPost('nomeForn'));
            $FornecedorModelo->set('emailForn', $request->getPost('emailForn'));
            $FornecedorModelo->set('foneForn', $request->getPost('foneForn'));


            if ($FornecedorModelo->insert()) {
                $data['msg'] = "Informações cadastradas com sucesso";
            } else {
                $data['msg'] = "Informações não cadastradas";
            }
        }

        echo view('header');
        echo view('cadFornecedor', $data);
        echo view('footer');
    }

    public function alterarFornecedor()
    {
        $request  = service('request');
        
        $codForn = $request->getPost('codFornAlterar');
        $nomeForn = $request->getPost('nomeForn');
        $emailForn = $request->getPost('emailForn');
        $foneForn = $request->getPost('foneForn');


        $FornecedorModel = new \App\Models\FornecedorModel();
        $registros = $FornecedorModel->find($codForn);
        $data['fornecedor'] = $registros;


        $nomeForn = $request->getPost('nomeForn');

        if ($nomeForn) {
            $registros->nomeForn = $nomeForn;

            if ($FornecedorModel->update($codForn, $registros)) {
                return redirect()->to(base_url('FornecedorController/todosFornecedores'));
            } else {
                return redirect()->to(base_url('FornecedorController/todosFornecedores'));
            }
        }
        
        echo view('header');
        echo view('alterarFormFornecedor', $data);
        echo view('footer');
    }


    public function deletarFornecedor($codfornecedor = null)
    {
        $request = service('request');
        $codfornecedor = $request->getPost('codFornDel');

        if (is_null($codfornecedor)) {
            return redirect()->to(base_url('FornecedorController/todosFornecedores'));
        }

        $FornecedorModel = new \App\Models\FornecedorModel();
        if ($FornecedorModel->delete($codfornecedor)) {
            return redirect()->to(base_url('FornecedorController/todosFornecedores'));
        } else {
            return redirect()->to(base_url('FornecedorController/todosFornecedores'));
        }
    }

    public function todosFornecedores()
    {
        $FornecedorModel = new \App\Models\FornecedorModel();
        $registros = $FornecedorModel->find();
        $data['fornecedores'] = $registros;

        $request  = service('request');
        $codfornecedor = $request->getPost('codFornDel');
        $codFornAlterar = $request->getPost('codFornAlterar');

        if ($codfornecedor) {
            $this->deletarFornecedor($codfornecedor);
            return redirect()->to(base_url('FornecedorController/todosFornecedores'));
        }

        if ($codFornAlterar) {
            return $this->alterarFornecedor($codFornAlterar);
            return redirect()->to(base_url('FornecedorController/todosFornecedores'));
        }

        echo view('header');
        echo view('listaFornecedor', $data);
        echo view('footer');
    }

    public function listaCodFornecedor()
    {
        $request  = service('request');
        $FornecedorModel = new \App\Models\FornecedorModel();
        $codForn = $request->getPost('codFornBusca');
        $registros = $FornecedorModel->find($codForn);
        $data['fornecedor'] = $registros;


        $codfornecedor = $request->getPost('codFornDel');
        $codFornAlterar = $request->getPost('codFornAlterar');

        if ($request->getPost('codFornDel')) {
            $this->deletarFornecedor($codfornecedor);
            return redirect()->to(base_url('FornecedorController/todosFornecedores'));
        }

        if ($request->getPost('codFornAlterar')) {
            return $this->alterarFornecedor($codFornAlterar);
            return redirect()->to(base_url('FornecedorController/todosFornecedores'));
        }



        echo view('header');
        echo view('listaCodForn',$data);
        echo view('footer');
    }
}
