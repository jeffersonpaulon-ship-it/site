<?php

namespace App\Controllers;

use App\Models\PageModel;
use CodeIgniter\Controller;

class PagesController extends BaseController
{
    public function index()
    {
        $pageModel = new PageModel();
        $pages = $pageModel->findAll();

        return view('admin/pages', ['pages' => $pages]);
    }

    public function create()
    {
        return view('admin/pages_create');
    }

    public function store()
    {
        $pageModel = new PageModel();

        // Validação
        $validation = $this->validate([
            'menu_id' => 'required',
            'title_destaque1' => 'required|min_length[3]',
            'text1' => 'required',
            'background' => 'uploaded[background]|is_image[background]|mime_in[background,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload da imagem de fundo
        $background = $this->request->getFile('background');
        $backgroundName = '';
        if ($background && $background->isValid()) {
            $backgroundName = $background->getRandomName();
            $background->move(FCPATH . 'uploads/pages', $backgroundName);
        }

        // Inserir no banco de dados
        $data = [
            'menu_id' => $this->request->getPost('menu_id'),
            'background' => $backgroundName,
            'photo_destaque' => $this->request->getPost('photo_destaque'),
            'content' => $this->request->getPost('content'),
            'gallery_id' => $this->request->getPost('gallery_id') ? $this->request->getPost('gallery_id') : NULL,  // Se não enviado, definir como NULL
            'title_destaque1' => $this->request->getPost('title_destaque1'),
            'text1' => $this->request->getPost('text1'),
            'title_destaque2' => $this->request->getPost('title_destaque2'),
            'text2' => $this->request->getPost('text2'),
            'title_beneficios' => $this->request->getPost('title_beneficios'),
            'text_beneficios' => $this->request->getPost('text_beneficios'),
            'photo_beneficios' => $this->request->getPost('photo_beneficios'),
            'text3' => $this->request->getPost('text3'),
            'text4' => $this->request->getPost('text4'),
            'text5' => $this->request->getPost('text5'),
            'partials1' => $this->request->getPost('partials1'),
            'partials2' => $this->request->getPost('partials2'),
            'partials3' => $this->request->getPost('partials3')
        ];

        $pageModel->insert($data);

        return redirect()->to('/admin/pages')->with('success', 'Página criada com sucesso!');
    }


    public function edit($id)
    {
        $pageModel = new PageModel();
        $page = $pageModel->find($id);

        if (!$page) {
            return redirect()->back()->with('error', 'Página não encontrada.');
        }

        return view('admin/pages_edit', ['page' => $page]);
    }

    public function update($id)
    {
        $pageModel = new PageModel();

        // Validação
        $validation = $this->validate([
            'menu_id' => 'required',
            'title_destaque1' => 'required|min_length[3]',
            'text1' => 'required',
            'background' => 'is_image[background]|mime_in[background,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Buscar os dados da página antes de atualizar
        $page = $pageModel->find($id);

        // Upload da imagem de fundo (apenas se uma nova imagem foi enviada)
        $background = $this->request->getFile('background');
        if ($background && $background->isValid()) {
            $backgroundName = $background->getRandomName();
            $background->move(FCPATH . 'uploads/pages', $backgroundName);
            $data['background'] = $backgroundName;
        } else {
            // Manter a imagem atual caso não seja feito o upload de uma nova
            $data['background'] = $page['background'];
        }

        // Atualizar dados no banco
        $data = [
            'menu_id' => $this->request->getPost('menu_id'),
            'photo_destaque' => $this->request->getPost('photo_destaque'),
            'content' => $this->request->getPost('content'),
            'gallery_id' => $this->request->getPost('gallery_id') ? $this->request->getPost('gallery_id') : NULL,  // Se não enviado, definir como NULL
            'title_destaque1' => $this->request->getPost('title_destaque1'),
            'text1' => $this->request->getPost('text1'),
            'title_destaque2' => $this->request->getPost('title_destaque2'),
            'text2' => $this->request->getPost('text2'),
            'title_beneficios' => $this->request->getPost('title_beneficios'),
            'text_beneficios' => $this->request->getPost('text_beneficios'),
            'photo_beneficios' => $this->request->getPost('photo_beneficios'),
            'text3' => $this->request->getPost('text3'),
            'text4' => $this->request->getPost('text4'),
            'text5' => $this->request->getPost('text5'),
            'partials1' => $this->request->getPost('partials1'),
            'partials2' => $this->request->getPost('partials2'),
            'partials3' => $this->request->getPost('partials3')
        ];

        $pageModel->update($id, $data);

        return redirect()->to('/admin/pages')->with('success', 'Página atualizada com sucesso!');
    }


    public function delete($id)
    {
        $pageModel = new PageModel();
        $pageModel->delete($id);

        return redirect()->to('/admin/pages')->with('success', 'Página excluída com sucesso!');
    }
}