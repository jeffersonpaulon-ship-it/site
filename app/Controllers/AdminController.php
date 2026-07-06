<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BlogModel;
use App\Models\CaseModel;
use App\Models\ClientLogoModel;
use App\Models\TestimonialModel;
use App\Models\CastingModel;

class AdminController extends BaseController
{
    // Exibe a tela de login
    public function index()
    {
        return view('admin/index');  // Carregar a view de login
    }

    // Processa o login
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        log_message('debug', "Tentativa de login para o usuário: {$username}");
    
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();
    
        if ($user && password_verify($password, $user['password'])) {
            log_message('debug', "Login bem-sucedido para o usuário: {$username}");
            session()->set('isLoggedIn', true);
            session()->set('username', $user['username']);
            session()->set('userId', $user['id']);
            
            log_message('debug', "Sessão configurada: " . json_encode(session()->get()));
            
            return redirect()->to('/admin/dashboard');
        } else {
            log_message('debug', "Login falhou para o usuário: {$username}");
            return redirect()->back()->with('error', 'Usuário ou senha inválidos');
        }
    }

    // Método de logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
    
    // Novos métodos de recuperação de senha (adicione aqui)
    public function forgotPassword()
    {
        return view('admin/forgot_password');
    }

    public function processForgotPassword()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'E-mail não encontrado.');
        }

        // Gerar token único
        $token = bin2hex(random_bytes(32));
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Salvar token no banco de dados
        $userModel->update($user['id'], [
            'reset_token' => $token,
            'reset_token_expires_at' => $expiration
        ]);

        // Enviar e-mail com o link de recuperação
        $email = \Config\Services::email();
        $email->setTo($user['email']);
        $email->setSubject('Recuperação de Senha');
        $email->setMessage('Clique no link a seguir para redefinir sua senha: ' . base_url("admin/reset-password/$token"));
        $email->send();

        return redirect()->back()->with('success', 'Um e-mail de recuperação foi enviado.');
    }

    public function resetPassword($token)
    {
        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)
                          ->where('reset_token_expires_at >', date('Y-m-d H:i:s'))
                          ->first();

        if (!$user) {
            return redirect()->to('/admin')->with('error', 'Token inválido ou expirado.');
        }

        return view('admin/reset_password', ['token' => $token]);
    }

    public function processResetPassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $passwordConfirm = $this->request->getPost('password_confirm');
    
        if ($password !== $passwordConfirm) {
            return redirect()->back()->with('error', 'As senhas não coincidem.');
        }
    
        $userModel = new UserModel();
        $user = $userModel->where('reset_token', $token)
                          ->where('reset_token_expires_at >', date('Y-m-d H:i:s'))
                          ->first();
    
        if (!$user) {
            return redirect()->to('/admin')->with('error', 'Token inválido ou expirado.');
        }
    
        // Atualizar a senha e limpar o token
        $updated = $userModel->update($user['id'], [
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'reset_token' => null,
            'reset_token_expires_at' => null
        ]);
        
        log_message('debug', 'Atualização de senha: ' . ($updated ? 'Sucesso' : 'Falha') . ' para o usuário ID ' . $user['id']);
    
        if ($updated) {
            return redirect()->to('/admin')->with('success', 'Senha redefinida com sucesso. Você pode fazer login agora.');
        } else {
            return redirect()->to('/admin')->with('error', 'Erro ao redefinir a senha. Tente novamente.');
        }
    }
    
     // Verificação de autenticação
    private function checkAuth()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin')->with('error', 'Por favor, faça login para acessar esta página.');
        }
    }

    // Página de dashboard
    public function dashboard()
    {
        log_message('debug', 'Método dashboard iniciado');
        log_message('debug', 'Status da sessão: ' . json_encode(session()->get()));
    
        $this->checkAuth();
        
        if (!session()->get('isLoggedIn')) {
            log_message('debug', 'Usuário não está logado, redirecionando para a página de login');
            return redirect()->to('/admin');
        }

        $userModel = new UserModel();
        $blogModel = new BlogModel();
        $caseModel = new CaseModel();
        $clientModel = new ClientLogoModel();

        $totalUsers = $userModel->countAll();
        $totalBlogs = $blogModel->countAll();
        $totalCases = $caseModel->countAll();
        $totalClients = $clientModel->countAll();
        
        log_message('debug', 'Renderizando a view do dashboard');

        return view('admin/dashboard', [
            'totalUsers' => $totalUsers,
            'totalBlogs' => $totalBlogs,
            'totalCases' => $totalCases,
            'totalClients' => $totalClients
        ]);
    }

    // Gerenciar Menus
    public function manageMenus()
    {
        $menuModel = new \App\Models\MenuModel();
        $menus = $menuModel->findAll();

        return view('admin/menus', [
            'items' => $menus,
            'entityName' => 'Menus',
            'entity' => 'menus'
        ]);
    }

    // Gerenciar Blog (Listagem)
    public function manageBlog()
    {
        $blogModel = new BlogModel();
        $blogs = $blogModel->findAll();

        return view('admin/blog', [
            'items' => $blogs,
            'entityName' => 'Blogs',
            'entity' => 'blog'
        ]);
    }

    // Exibe o formulário de criação de blogs
    public function createBlog()
    {
        return view('admin/blog_create');
    }

    // Armazena um novo blog
    public function storeBlog()
    {
        $blogModel = new BlogModel();

        // Validação dos dados recebidos
        $validation = $this->validate([
            'title' => 'required|min_length[3]',
            'slug' => 'required',
            'author' => 'required',
            'category' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'main_image' => 'uploaded[main_image]|is_image[main_image]|mime_in[main_image,image/jpg,image/jpeg,image/png]',
            'additional_images.*' => 'is_image[additional_images]|mime_in[additional_images,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload da imagem principal
        $mainImage = $this->request->getFile('main_image');
        $mainImageName = '';
        if ($mainImage && $mainImage->isValid()) {
            $mainImageName = $mainImage->getRandomName();
            $mainImage->move(FCPATH . 'uploads', $mainImageName);  // Salva em public/uploads
        }

        // Upload de imagens adicionais
        $additionalImages = $this->request->getFiles('additional_images');
        $additionalImageNames = [];
        if ($additionalImages) {
            foreach ($additionalImages['additional_images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $imageName = $image->getRandomName();
                    $image->move(FCPATH . 'uploads', $imageName);  // Salva em public/uploads
                    $additionalImageNames[] = $imageName;
                }
            }
        }

        // Dados para inserção
        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'author' => $this->request->getPost('author'),
            'category' => $this->request->getPost('category'),
            'subtitle' => $this->request->getPost('subtitle'),
            'content' => $this->request->getPost('content'),
            'main_image' => $mainImageName,
            'additional_images' => implode(',', $additionalImageNames),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $blogModel->insert($data);

        return redirect()->to('/admin/blog')->with('success', 'Blog criado com sucesso!');
    }

    // Exibe o formulário de edição de um blog
    public function editBlog($id)
    {
        $blogModel = new BlogModel();
        $blog = $blogModel->find($id);

        if (!$blog) {
            return redirect()->back()->with('error', 'Blog não encontrado.');
        }

        return view('admin/blog_edit', ['blog' => $blog]);
    }

    // Atualiza um blog existente
    public function updateBlog($id)
    {
        $blogModel = new BlogModel();

        // Validação dos dados recebidos
        $validation = $this->validate([
            'title' => 'required|min_length[3]',
            'slug' => 'required',
            'author' => 'required',
            'category' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'main_image' => 'is_image[main_image]|mime_in[main_image,image/jpg,image/jpeg,image/png]',
            'additional_images.*' => 'mime_in[additional_images,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Preparar dados para atualização
        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->request->getPost('slug'),
            'author' => $this->request->getPost('author'),
            'category' => $this->request->getPost('category'),
            'subtitle' => $this->request->getPost('subtitle'),
            'content' => $this->request->getPost('content'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Verificar se há uma nova imagem principal enviada
        $mainImage = $this->request->getFile('main_image');
        if ($mainImage && $mainImage->isValid()) {
            $newName = $mainImage->getRandomName();
            $mainImage->move(FCPATH . 'uploads', $newName);  // Salva em public/uploads
            $data['main_image'] = $newName;
        }

        // Verificar se há imagens adicionais enviadas
        $additionalImages = $this->request->getFiles('additional_images');
        if (!empty($additionalImages)) {
            $uploadedImages = [];
            foreach ($additionalImages['additional_images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $imgName = $img->getRandomName();
                    $img->move(FCPATH . 'uploads', $imgName);  // Salva em public/uploads
                    $uploadedImages[] = $imgName;
                }
            }
            if (!empty($uploadedImages)) {
                $data['additional_images'] = implode(',', $uploadedImages);
            }
        }

        // Atualizar o blog no banco de dados
        $updated = $blogModel->update($id, $data);

        if ($updated) {
            return redirect()->to('/admin/blog')->with('success', 'Blog atualizado com sucesso!');
        } else {
            return redirect()->back()->with('error', 'Erro ao atualizar o blog.');
        }
    }


    // Exclui um blog
    public function deleteBlog($id)
    {
        $blogModel = new BlogModel();
        $blogModel->delete($id);

        return redirect()->to('/admin/blog')->with('success', 'Blog excluído com sucesso!');
    }

    // Gerenciar Cases
    public function manageCases()
    {
        $caseModel = new CaseModel();
        $cases = $caseModel->findAll();

        return view('admin/cases', [
            'items' => $cases,
            'entityName' => 'Cases',
            'entity' => 'case'
        ]);
    }

    // Gerenciar Usuários
    public function manageUsers()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return view('admin/users', [
            'items' => $users,
            'entityName' => 'Users',
            'entity' => 'users'
        ]);
    }

    // Gerenciar Clientes
    public function manageClients()
    {
        $clientModel = new ClientLogoModel();
        $clients = $clientModel->findAll();

        return view('admin/clients', [
            'items' => $clients,
            'entityName' => 'Clients',
            'entity' => 'clients'
        ]);
    }

    // Gerenciar Fotos
    public function managePhotos()
    {
        // Supondo que exista um GalleryModel para as fotos
        $gallerymodel = new \App\Models\GalleryModel(); // Corrigir o nome do model

        $photos = $gallerymodel->findAll();

        return view('admin/photo', [
            'items' => $photos,
            'entityName' => 'Photos',
            'entity' => 'photo'
        ]);
    }

    // Gerenciar Depoimentos
    public function manageDepoiments()
    {
        // Carregar o modelo de depoimentos (usando o TestimonialModel)
        $testimonialmodel = new TestimonialModel();

        // Buscar todos os depoimentos
        $depoiments = $testimonialmodel->findAll();

        // Carregar a view e passar os depoimentos para ela
        return view('admin/depoiment', [
            'items' => $depoiments,  // Passar os depoimentos para a view
        ]);
    }
    
    // Gerenciar Casting
    protected $castingModel;

    public function __construct()
    {
        $this->castingModel = new \App\Models\CastingModel();
    }
    
    public function manageCasting()
    {
        $data['casting'] = $this->castingModel->findAll();
        $data['title'] = 'Gerenciamento de Casting';
    
        return view('admin/casting', $data);
    }
    
    public function viewCasting($id)
    {
        $data['pessoa'] = $this->castingModel->find($id);
        if (empty($data['pessoa'])) {
            return redirect()->to('/admin/casting')->with('error', 'Pessoa não encontrada.');
        }
        return view('admin/casting_view', $data);
    }
    
    public function editCasting($id = null)
    {
        $data['pessoa'] = $this->castingModel->find($id);
    
        if (empty($data['pessoa'])) {
            return redirect()->to('/admin/casting')->with('error', 'Pessoa não encontrada.');
        }
    
        if ($this->request->getMethod() === 'post') {
            $post = $this->request->getPost();
            if ($this->castingModel->update($id, $post)) {
                return redirect()->to('/admin/casting')->with('success', 'Pessoa atualizada com sucesso.');
            } else {
                return redirect()->back()->withInput()->with('errors', $this->castingModel->errors());
            }
        }
    
        $data['title'] = 'Editar Casting';
    
        return view('admin/casting_edit', $data);
    }
    
    public function deleteCasting($id = null)
    {
        if ($this->castingModel->delete($id)) {
            return redirect()->to('/admin/casting')->with('success', 'Pessoa excluída com sucesso.');
        }
        return redirect()->to('/admin/casting')->with('error', 'Não foi possível excluir o registro.');
    }
    
    public function performanceDashboard()
{
    $db = \Config\Database::connect();
    
    // 1. Mapeamento de pastas de upload críticas para o Mobile (Ajustado conforme suas URLs reais)
    $uploadPaths = [
        'Banners/Sliders'   => ROOTPATH . 'public/uploads/', // Onde ficam os sliders principais
        'Logos de Clientes' => ROOTPATH . 'public/uploads/clientes/',
        'Fotos de Cases'    => ROOTPATH . 'public/uploads/cases/',
        'Imagens do Blog'   => ROOTPATH . 'public/uploads/' // Algumas sobem direto na raiz de uploads
    ];

    $heavyImages = [];
    $totalUploadsSize = 0;

    foreach ($uploadPaths as $category => $path) {
        if (is_dir($path)) {
            $files = glob($path . '*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    $sizeInBytes = filesize($file);
                    $totalUploadsSize += $sizeInBytes;
                    $sizeInKb = round($sizeInBytes / 1024, 2);

                    // Se a imagem passar de 200KB, ela entra na lista de alerta de vilões do mobile
                    if ($sizeInKb > 200) {
                        $heavyImages[] = [
                            'category'  => $category,
                            'filename'  => basename($file),
                            'size'      => $sizeInKb,
                            'status'    => $sizeInKb > 500 ? 'Crítico (Reduzir Urgente)' : 'Alerta (Otimizar)'
                        ];
                    }
                }
            }
        }
    }

    // 2. Medição do tamanho da pasta de cache físico do CodeIgniter
    $cachePath = WRITEPATH . 'cache/';
    $cacheSize = 0;
    if (is_dir($cachePath)) {
        $cacheFiles = glob($cachePath . '*');
        foreach ($cacheFiles as $cf) {
            if (is_file($cf)) {
                $cacheSize += filesize($cf);
            }
        }
    }

    // 3. AUDITORIA DE ASSETS: Lista global de tudo que está fixo no Header/Footer hoje
    $todosOsCSS = [
        'bootstrap.min.css', 'animate.min.css', 'custom-animate.css', 'fontawesome/all.min.css',
        'jarallax.css', 'jquery-magnific-popup/jquery.magnific-popup.css', 'nouislider.min.css',
        'nouislider.pips.css', 'odometer.min.css', 'swiper.min.css', 'qutiiz-icons/style.css',
        'qutiiz-icons-two/style.css', 'tiny-slider.min.css', 'reey-font/stylesheet.css',
        'owl.carousel.min.css', 'owl.theme.default.min.css', 'bxslider/jquery.bxslider.css',
        'bootstrap-select.min.css', 'vegas/vegas.min.css', 'jquery-ui.css', 'timePicker.css',
        'qutiiz.css', 'qutiiz-responsive.css'
    ];

    $todosOsJS = [
        'jquery-3.6.0.min.js', 'bootstrap.bundle.min.js', 'jarallax.min.js', 'jquery.ajaxchimp.min.js',
        'jquery.appear.min.js', 'jquery.circle-progress.min.js', 'jquery.magnific-popup.min.js',
        'jquery.validate.min.js', 'nouislider.min.js', 'odometer.min.js', 'swiper.min.js',
        'tiny-slider.min.js', 'wNumb.min.js', 'wow.js', 'isotope.js', 'countdown.min.js',
        'owl.carousel.min.js', 'jquery.bxslider.min.js', 'bootstrap-select.min.js', 'vegas/vegas.min.js',
        'jquery-ui.js', 'timePicker.js', 'qutiiz.js'
    ];

    // Mapeamento real do uso das páginas do ecossistema CSF
    $mapeamentoRotas = [
        'Home / Landing Page' => [
            'css' => ['bootstrap.min.css', 'animate.min.css', 'custom-animate.css', 'fontawesome/all.min.css', 'jquery-magnific-popup/jquery.magnific-popup.css', 'odometer.min.css', 'swiper.min.css', 'qutiiz-icons/style.css', 'owl.carousel.min.css', 'owl.theme.default.min.css', 'qutiiz.css', 'qutiiz-responsive.css'],
            'js'  => ['jquery-3.6.0.min.js', 'bootstrap.bundle.min.js', 'jquery.appear.min.js', 'jquery.magnific-popup.min.js', 'odometer.min.js', 'swiper.min.js', 'wow.js', 'owl.carousel.min.js', 'qutiiz.js'],
            'obs' => 'Slide de destaque, logos de clientes, animações WOW e contador estatístico.'
        ],
        'Manual do Expositor (CAEX)' => [
            'css' => ['bootstrap.min.css', 'fontawesome/all.min.css', 'bootstrap-select.min.css', 'timePicker.css', 'qutiiz.css', 'qutiiz-responsive.css'],
            'js'  => ['jquery-3.6.0.min.js', 'bootstrap.bundle.min.js', 'jquery.validate.min.js', 'bootstrap-select.min.js', 'timePicker.js', 'qutiiz.js'],
            'obs' => 'Painel de formulários, upload de notas/arquivos, selects customizados e horários.'
        ],
        'Controle de Acesso' => [
            'css' => ['bootstrap.min.css', 'fontawesome/all.min.css', 'qutiiz.css', 'qutiiz-responsive.css'],
            'js'  => ['jquery-3.6.0.min.js', 'bootstrap.bundle.min.js', 'qutiiz.js'],
            'obs' => 'Institucional simples focado em apresentar soluções de biometria e catracas.'
        ],
        'RSVP / Ingressos' => [
            'css' => ['bootstrap.min.css', 'fontawesome/all.min.css', 'jquery-ui.css', 'qutiiz.css', 'qutiiz-responsive.css'],
            'js'  => ['jquery-3.6.0.min.js', 'bootstrap.bundle.min.js', 'jquery.validate.min.js', 'jquery-ui.js', 'qutiiz.js'],
            'obs' => 'Formulário de inscrição externa com calendário nativo do jQuery UI.'
        ],
        'Blog (Index e Post)' => [
            'css' => ['bootstrap.min.css', 'fontawesome/all.min.css', 'qutiiz.css', 'qutiiz-responsive.css'],
            'js'  => ['jquery-3.6.0.min.js', 'bootstrap.bundle.min.js', 'qutiiz.js'],
            'obs' => 'Feed de notícias e visualização de posts textuais.'
        ]
    ];

    // 4. Processamento de desperdício cruzando dados via backend
    $analisePaginas = [];
    foreach ($mapeamentoRotas as $nome => $deps) {
        $analisePaginas[$nome] = [
            'css_utilizados' => count($deps['css']),
            'css_inuteis'    => array_diff($todosOsCSS, $deps['css']),
            'js_utilizados'  => count($deps['js']),
            'js_inuteis'     => array_diff($todosOsJS, $deps['js']),
            'obs'            => $deps['obs']
        ];
    }

    // 5. Consolidação final de variáveis para a View
    $performanceData = [
        'heavyImages'      => $heavyImages,
        'totalUploadsMb'   => round($totalUploadsSize / (1024 * 1024), 2),
        'cacheSizeKb'      => round($cacheSize / 1024, 2),
        'memoryUsage'      => round(memory_get_usage() / (1024 * 1024), 2) . ' MB',
        'phpVersion'       => PHP_VERSION,
        'environment'      => ENVIRONMENT,
        'analisePaginas'   => $analisePaginas // Nova array que alimenta o painel de dependências
    ];

    // Retorna a view administrativa injetando os dados consolidados
    return view('admin/performance', $performanceData);
}

}