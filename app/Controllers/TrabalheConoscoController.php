<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\TrabalheConoscoModel;
use CodeIgniter\Controller;

class TrabalheConoscoController extends BaseController
{
    public function index()
    {
        // Carregar o MenuModel
        $menuModel = new MenuModel();
        $menuItems = $menuModel->orderBy('order', 'ASC')->findAll();
        $menuTree = $this->buildMenuTree($menuItems);

        // Defina os dados de SEO manualmente, pois $pageSeo não está definido no seu código
        $seoData = [
            'title'       => 'Trabalhe Conosco | Credenciamento Sem Fila',
            'description' => 'Preencha os campos abaixo e vamos trabalhar juntos em breve!',
            'keywords'    => 'trabalhe conosco, vagas credenciamento sem fila',
            'image'       => base_url('assets/images/brand/logo-credenciamento-sem-fila.svg'),
            'canonical'   => base_url('trabalhe-conosco'),
        ];

        // Carregar a view de contato
        return view('pages/trabalhe-conosco', [
            'menuTree'    => $menuTree,
            'seoData'     => $seoData,
            'isHome'      => false
        ]);
    }
    
    public function checkCpf()
    {
        $cpf = $this->request->getPost('cpf');
        $model = new TrabalheConoscoModel();

        $existingRecord = $model->where('cpf', $cpf)->first();

        return $this->response->setJSON([
            'exists' => $existingRecord !== null,
        ]);
    }
    
    public function submit()
    {
        $model = new TrabalheConoscoModel();
        // Regras de validação
        $rules = [
            'nome' => 'required|min_length[3]',
            'sobrenome' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'senha' => 'required|min_length[6]',
            'cpf' => 'required|exact_length[11]|numeric',
            'mei' => 'required',
            'celular' => 'required',
            'data_nascimento' => 'required|valid_date',
            'cep' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'idiomas' => 'required',
            'funcao_pretendida' => 'required',
            'foto_perfil_1' => 'uploaded[foto_perfil_1]|mime_in[foto_perfil_1,image/jpg,image/jpeg,image/png]|max_size[foto_perfil_1,2048]',
            'foto_corpo_inteiro_1' => 'uploaded[foto_corpo_inteiro_1]|mime_in[foto_corpo_inteiro_1,image/jpg,image/jpeg,image/png]|max_size[foto_corpo_inteiro_1,2048]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $this->validator->getErrors(),
            ]);
        }

        // Gerenciar uploads
        $uploadsPath = FCPATH . 'uploads/trabalheconosco/';

        if (!is_dir($uploadsPath)) {
            mkdir($uploadsPath, 0777, true);
        }

        // Upload da foto de perfil
        $fotoPerfil = $this->request->getFile('foto_perfil_1');
        $fotoPerfilName = null;
        if ($fotoPerfil->isValid() && !$fotoPerfil->hasMoved()) {
            $fotoPerfilName = $fotoPerfil->getRandomName();
            $fotoPerfil->move($uploadsPath, $fotoPerfilName);
        }

        // Upload da foto de corpo inteiro
        $fotoCorpoInteiro = $this->request->getFile('foto_corpo_inteiro_1');
        $fotoCorpoInteiroName = null;
        if ($fotoCorpoInteiro->isValid() && !$fotoCorpoInteiro->hasMoved()) {
            $fotoCorpoInteiroName = $fotoCorpoInteiro->getRandomName();
            $fotoCorpoInteiro->move($uploadsPath, $fotoCorpoInteiroName);
        }

        // Preparar os dados para salvar
        $data = [
            'mei' => $this->request->getPost('mei'),
            'cnpj' => $this->request->getPost('cnpj') ?? null,
            'cpf' => $this->request->getPost('cpf'),
            'nome' => $this->request->getPost('nome'),
            'sobrenome' => $this->request->getPost('sobrenome'),
            'apelido' => $this->request->getPost('apelido') ?? '',
            'celular' => $this->request->getPost('celular'),
            'email' => $this->request->getPost('email'),
            'senha' => password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT),
            'data_nascimento' => $this->request->getPost('data_nascimento'),
            'cep' => $this->request->getPost('cep'),
            'endereco' => $this->request->getPost('endereco'),
            'numero' => $this->request->getPost('numero'),
            'bairro' => $this->request->getPost('bairro'),
            'cidade' => $this->request->getPost('cidade'),
            'uf' => $this->request->getPost('uf'),
            'possui_veiculo' => $this->request->getPost('possui_veiculo'),
            'idiomas' => implode(',', $this->request->getPost('idiomas')),
            'funcao_pretendida' => $this->request->getPost('funcao_pretendida'),
            'foto_perfil_1' => $fotoPerfilName,
            'foto_corpo_inteiro_1' => $fotoCorpoInteiroName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        try {
            $model->save($data);
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Cadastro realizado com sucesso!',
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Erro ao salvar no banco: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'errors' => ['database' => 'Ocorreu um erro ao salvar os dados. Por favor, tente novamente.'],
            ]);
        }
    }
}