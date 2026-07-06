<?php

namespace App\Controllers;

use App\Models\ProdutoServicoModel;

class ProdutoServicoController extends BaseController
{
    protected $produtoServicoModel;

    public function __construct()
    {
        $this->produtoServicoModel = new ProdutoServicoModel();
    }

    public function index()
    {
        $data['produtos_servicos'] = $this->produtoServicoModel->findAll();
        return view('admin/produtos_servicos/index', $data);
    }

    public function create()
    {
        return view('admin/produtos_servicos/create');
    }

    public function store()
    {
        $data = $this->request->getPost();
        
        if ($this->produtoServicoModel->insert($data)) {
            return redirect()->to('/admin/produtos-servicos')->with('success', 'Produto/Serviço criado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->produtoServicoModel->errors());
        }
    }

    public function edit($id)
    {
        $data['produto_servico'] = $this->produtoServicoModel->find($id);
        
        if (empty($data['produto_servico'])) {
            return redirect()->to('/admin/produtos-servicos')->with('error', 'Produto/Serviço não encontrado.');
        }

        return view('admin/produtos_servicos/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        
        if ($this->produtoServicoModel->update($id, $data)) {
            return redirect()->to('/admin/produtos-servicos')->with('success', 'Produto/Serviço atualizado com sucesso.');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->produtoServicoModel->errors());
        }
    }

    public function delete($id)
    {
        if ($this->produtoServicoModel->delete($id)) {
            return redirect()->to('/admin/produtos-servicos')->with('success', 'Produto/Serviço excluído com sucesso.');
        } else {
            return redirect()->to('/admin/produtos-servicos')->with('error', 'Não foi possível excluir o Produto/Serviço.');
        }
    }
}