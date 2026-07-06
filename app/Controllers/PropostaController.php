<?php

namespace App\Controllers;

use App\Models\PropostaModel;
use App\Models\ItemPropostaModel;
use App\Models\ProdutoServicoModel;

class PropostaController extends BaseController
{
    protected $propostaModel;
    protected $itemPropostaModel;
    protected $produtoServicoModel;

    public function __construct()
    {
        $this->propostaModel = new PropostaModel();
        $this->itemPropostaModel = new ItemPropostaModel();
        $this->produtoServicoModel = new ProdutoServicoModel();
    }

    public function index()
    {
        $data['propostas'] = $this->propostaModel->findAll();
        return view('admin/propostas/index', $data);
    }

    public function create()
    {
        $data['produtos_servicos'] = $this->produtoServicoModel->findAll();
        return view('admin/propostas/create', $data);
    }

    public function store()
    {
        $propostaData = $this->request->getPost();
        $propostaData['numero'] = $this->propostaModel->gerarNumeroProposta();

        $this->propostaModel->insert($propostaData);
        $propostaId = $this->propostaModel->getInsertID();

        $itens = $this->request->getPost('itens');
        foreach ($itens as $item) {
            $item['proposta_id'] = $propostaId;
            $this->itemPropostaModel->insert($item);
        }

        return redirect()->to('/admin/propostas')->with('success', 'Proposta criada com sucesso.');
    }

    public function edit($id)
    {
        $data['proposta'] = $this->propostaModel->find($id);
        $data['itens'] = $this->itemPropostaModel->where('proposta_id', $id)->findAll();
        $data['produtos_servicos'] = $this->produtoServicoModel->findAll();
        return view('admin/propostas/edit', $data);
    }

    public function update($id)
    {
        $propostaData = $this->request->getPost();
        $this->propostaModel->update($id, $propostaData);

        $this->itemPropostaModel->where('proposta_id', $id)->delete();

        $itens = $this->request->getPost('itens');
        foreach ($itens as $item) {
            $item['proposta_id'] = $id;
            $this->itemPropostaModel->insert($item);
        }

        return redirect()->to('/admin/propostas')->with('success', 'Proposta atualizada com sucesso.');
    }

    public function delete($id)
    {
        $this->itemPropostaModel->where('proposta_id', $id)->delete();
        $this->propostaModel->delete($id);
        return redirect()->to('/admin/propostas')->with('success', 'Proposta excluída com sucesso.');
    }
}