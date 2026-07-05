<?php

namespace App\Controllers;

use App\Models\ClientLogoModel;

class ClientLogoController extends BaseController
{
    protected $clientLogoModel;

    public function __construct()
    {
        $this->clientLogoModel = new ClientLogoModel();
    }

    // Exibir os logos no frontend
    public function index()
    {
        // Buscar os logotipos dos clientes
        $clientLogos = $this->clientLogoModel->getClientLogos();

        // Passar os logotipos para a view
        return view('partials/client_logos', ['clientLogos' => $clientLogos]);
    }

    // Exibir formulário de criação de logotipo
    public function create()
    {
        return view('admin/client_logo_form');
    }

    // Inserir um novo logotipo de cliente
    public function store()
    {
        // Validação de formulário
        $validation = $this->validate([
            'client_name' => 'required|min_length[3]',
            'logo_image' => 'uploaded[logo_image]|is_image[logo_image]|max_size[logo_image,2048]',
            'logo_image_white' => 'uploaded[logo_image_white]|is_image[logo_image_white]|max_size[logo_image_white,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Processamento dos arquivos
        $logoImage = $this->request->getFile('logo_image');
        $logoImageWhite = $this->request->getFile('logo_image_white');

        if ($logoImage->isValid() && !$logoImage->hasMoved()) {
            $logoImageName = $logoImage->getRandomName();
            $logoImage->move('uploads/clientes', $logoImageName);
        }

        if ($logoImageWhite->isValid() && !$logoImageWhite->hasMoved()) {
            $logoImageWhiteName = $logoImageWhite->getRandomName();
            $logoImageWhite->move('uploads/clientes', $logoImageWhiteName);
        }

        // Inserir no banco
        $this->clientLogoModel->save([
            'client_name' => $this->request->getPost('client_name'),
            'logo_image' => $logoImageName,
            'logo_image_white' => $logoImageWhiteName,
            'order' => $this->request->getPost('order'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/clients')->with('success', 'Cliente criado com sucesso!');
    }

    // Exibir formulário de edição
    public function edit($id)
    {
        $data['item'] = $this->clientLogoModel->find($id);
        return view('admin/client_logo_form', $data);
    }

    // Atualizar um logotipo de cliente
    public function update($id)
    {
        // Validação de formulário
        $validation = $this->validate([
            'client_name' => 'required|min_length[3]',
            'logo_image' => 'is_image[logo_image]|max_size[logo_image,2048]',
            'logo_image_white' => 'is_image[logo_image_white]|max_size[logo_image_white,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Carregar cliente existente
        $client = $this->clientLogoModel->find($id);

        $logoImageName = $client['logo_image'];
        $logoImageWhiteName = $client['logo_image_white'];

        // Verifica se novos arquivos foram enviados
        if ($logoImage = $this->request->getFile('logo_image')) {
            if ($logoImage->isValid() && !$logoImage->hasMoved()) {
                $logoImageName = $logoImage->getRandomName();
                $logoImage->move('uploads/clientes', $logoImageName);
            }
        }

        if ($logoImageWhite = $this->request->getFile('logo_image_white')) {
            if ($logoImageWhite->isValid() && !$logoImageWhite->hasMoved()) {
                $logoImageWhiteName = $logoImageWhite->getRandomName();
                $logoImageWhite->move('uploads/clientes', $logoImageWhiteName);
            }
        }

        // Atualizar no banco
        $this->clientLogoModel->update($id, [
            'client_name' => $this->request->getPost('client_name'),
            'logo_image' => $logoImageName,
            'logo_image_white' => $logoImageWhiteName,
            'order' => $this->request->getPost('order'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/admin/clients')->with('success', 'Cliente atualizado com sucesso!');
    }

    // Deletar um cliente
    public function delete($id)
    {
        $this->clientLogoModel->delete($id);
        return redirect()->to('/admin/clients')->with('success', 'Cliente excluído com sucesso!');
    }
}