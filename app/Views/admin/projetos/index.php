<?= $this->include('admin/partials/headeradmin') ?> <div class="content-wrapper" style="padding: 20px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gerenciar Projetos (Cases de Sucesso)</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="card-title">Eventos Cadastrados no Site</h3>
            </div>
            <div class="card-body">
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Evento</th>
                            <th>Slug (URL)</th>
                            <th>Cliente</th>
                            <th>Categoria</th>
                            <th width="150">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($projetos)): foreach($projetos as $proj): ?>
                        <tr>
                            <td><?= $proj['id'] ?></td>
                            <td><strong><?= esc($proj['project_name']) ?></strong></td>
                            <td><span class="badge bg-secondary">/projeto/<?= esc($proj['slug']) ?></span></td>
                            <td><?= esc($proj['client_name']) ?></td>
                            <td><?= esc($proj['category']) ?></td>
                            <td>
                                <a href="<?= base_url('admin/projetos/editar/' . $proj['id']) ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Editar SEO
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Nenhum projeto encontrado.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?> ```

---

### 🔍 Por que a listagem pode não aparecer mesmo com o estilo corrigido?

Se após aplicar o código acima o design do AdminLTE carregar lindo na tela com o menu lateral, mas a tabela disser **"Nenhum projeto encontrado"**, o problema está no arquivo **`app/Controllers/AdminProjetosController.php`**. 

Verifique se dentro dele você criou o método `index` enviando a variável exatamente com o nome `'projetos'`, conforme estruturamos no passo anterior:

```php
public function index()
{
    $db = \Config\Database::connect();
    // Busca os dados da tabela galleries
    $projetos = $db->table('galleries')->get()->getResultArray();

    // Importante: O nome da chave no array tem que ser 'projetos'
    return view('admin/projetos/index', ['projetos' => $projetos]);
}