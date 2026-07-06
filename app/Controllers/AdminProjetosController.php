<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AdminProjetosController extends Controller
{
    public function index()
    {
        // Verifica se o usuário está logado
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $db = \Config\Database::connect();
        $projetos = $db->table('galleries')->get()->getResultArray();

        return view('admin/projetos/index', ['projetos' => $projetos]);
    }

    public function editar($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $db = \Config\Database::connect();
        $projeto = $db->table('galleries')->where('id', $id)->get()->getRowArray();

        if (!$projeto) {
            return redirect()->to('/admin/projetos')->with('error', 'Projeto não encontrado.');
        }

        return view('admin/projetos/editar', ['projeto' => $projeto]);
    }

    public function atualizar($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $db = \Config\Database::connect();
        
        $updateData = [
            'project_name'    => $this->request->getPost('project_name'),
            'slug'            => url_title($this->request->getPost('slug'), '-', true),
            'client_name'     => $this->request->getPost('client_name'),
            'category'        => $this->request->getPost('category'),
            'seo_h1'          => $this->request->getPost('seo_h1'),
            'content_html'    => $this->request->getPost('content_html'),
            'seo_title'       => $this->request->getPost('seo_title'),
            'seo_description' => $this->request->getPost('seo_description'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
        ];

        // 1. CAMINHO DA HOME: Enviado para assets/images/resources/
        $fileHome = $this->request->getFile('image_home'); // Certifique-se de ter esse input file com name="image_home" no HTML se desejar mudar a foto da listagem antiga
        if ($fileHome && $fileHome->isValid() && !$fileHome->hasMoved()) {
            $newNameHome = $fileHome->getRandomName();
            $fileHome->move(FCPATH . 'assets/images/resources', $newNameHome);
            $updateData['images'] = $newNameHome; // Atualiza a coluna antiga da home
        }

        // 2. CAMINHO DO BACKGROUND DO TOPO: Enviado para uploads/projects/
        $fileBg = $this->request->getFile('image_bg');
        if ($fileBg && $fileBg->isValid() && !$fileBg->hasMoved()) {
            $newNameBg = $fileBg->getRandomName();
            $fileBg->move(FCPATH . 'uploads/projects', $newNameBg);
            $updateData['image_bg'] = $newNameBg;
        }

        // 3. CAMINHO DA CAPA/DESTAQUE INTERNO: Enviado para uploads/projects/
        $fileDestaque = $this->request->getFile('image_destaque');
        if ($fileDestaque && $fileDestaque->isValid() && !$fileDestaque->hasMoved()) {
            $newNameDestaque = $fileDestaque->getRandomName();
            $fileDestaque->move(FCPATH . 'uploads/projects', $newNameDestaque);
            $updateData['image_destaque'] = $newNameDestaque;
        }

        // 4. CAMINHO DA GALERIA DE FOTOS MULTIPLAS: Enviado para uploads/projects/
        $galeriaArquivos = $this->request->getFileMultiple('galeria_fotos');
        if ($galeriaArquivos) {
            $fotosArray = [];
            foreach ($galeriaArquivos as $fotoFile) {
                if ($fotoFile->isValid() && !$fotoFile->hasMoved()) {
                    $newNameFoto = $fotoFile->getRandomName();
                    $fotoFile->move(FCPATH . 'uploads/projects', $newNameFoto);
                    $fotosArray[] = $newNameFoto;
                }
            }
            if (!empty($fotosArray)) {
                $updateData['galeria_fotos'] = json_encode($fotosArray);
            }
        }

        // Executa a atualização estável no banco de dados
        $db->table('galleries')->where('id', $id)->update($updateData);

        return redirect()->to('/admin/projetos')->with('success', 'Projeto e mídias atualizados com sucesso nos caminhos corretos!');
    }
}