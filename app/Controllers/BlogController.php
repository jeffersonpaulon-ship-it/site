<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\MenuModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class BlogController extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        // Inicializar o MenuModel
        $this->menuModel = new MenuModel();
        $this->blogModel = new BlogModel();
    }
    
    public function create()
    {
        $menuItems = $this->menuModel->orderBy('order', 'ASC')->findAll();
        $menuTree = $this->buildMenuTree($menuItems);

        return view('admin/blog/create', [
            'menuTree' => $menuTree,
        ]);
    }
    
    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]|max_length[255]',
            'author' => 'required|min_length[3]|max_length[100]',
            'category' => 'required|max_length[50]',
            'subtitle' => 'required|max_length[255]',
            'content' => 'required',
            'main_image' => 'uploaded[main_image]|max_size[main_image,1024]|is_image[main_image]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $mainImage = $this->request->getFile('main_image');
        $newName = $mainImage->getRandomName();
        $mainImage->move(ROOTPATH . 'public/uploads/blog', $newName);

        $additionalImages = [];
        if ($imagefile = $this->request->getFiles()) {
            foreach ($imagefile['additional_images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move(ROOTPATH . 'public/uploads/blog', $newName);
                    $additionalImages[] = $newName;
                }
            }
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'category' => $this->request->getPost('category'),
            'subtitle' => $this->request->getPost('subtitle'),
            'content' => $this->request->getPost('content'),
            'main_image' => $newName,
            'additional_images' => json_encode($additionalImages),
        ];

        if ($this->blogModel->insert($data)) {
            return redirect()->to('/admin/blog')->with('success', 'Post criado com sucesso!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Ocorreu um erro ao criar o post.');
        }
    }

    public function viewBlog($slug)
    {
        // Carregar os itens do menu
        $menuItems = $this->menuModel->orderBy('order', 'ASC')->findAll();
        $menuTree = $this->buildMenuTree($menuItems);

        $blogModel = new BlogModel();

        // Busca o blog com base no slug
        $blog = $blogModel->where('slug', $slug)->first();

        // Se o blog não for encontrado, exibe uma página de erro 404
        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Extrai as tags e converte para um array
        $tags = !empty($blog['tags']) ? explode(',', $blog['tags']) : [];

        // Busca os últimos posts (exibidos na sidebar)
        $latestPosts = $blogModel->orderBy('created_at', 'DESC')->limit(3)->findAll();

        // Dados de SEO para a página de detalhes do blog
        $seoData = [
            'title' => $blog['title'],
            'description' => substr(strip_tags($blog['content']), 0, 160), // Descrição limitada a 160 caracteres
            'keywords' => $blog['category'] . ', blog',
            'image' => base_url('assets/images/blog/' . $blog['main_image']),
            'canonical' => base_url('blog/' . $blog['slug']),
        ];

        // Passa os dados do blog, últimas postagens, menu e SEO para a view
        return view('pages/blog-details', [
            'blog' => $blog,
            'tags' => $tags,
            'latestPosts' => $latestPosts,
            'menuTree' => $menuTree,
            'seoData' => $seoData,
        ]);
    }

    protected function buildMenuTree($menuItems, $parentId = null)
    {
        $branch = [];
        foreach ($menuItems as $menuItem) {
            if ($menuItem['parent_id'] == $parentId) {
                $children = $this->buildMenuTree($menuItems, $menuItem['id']);
                if ($children) {
                    $menuItem['children'] = $children;
                }
                $branch[] = $menuItem;
            }
        }
        return $branch;
    }
    
}