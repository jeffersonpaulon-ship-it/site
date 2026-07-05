<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Gerenciar Páginas</h1>

                    <!-- Botão de adicionar novo item -->
                    <a href="/admin/blog/create" class="btn btn-success mb-3">Adicionar Nova Página</a>

                    <!-- Tabela de listagem -->
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Menu ID</th>
                            <th>Título Destaque 1</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($pages as $page): ?>
                            <tr>
                                <td><?= esc($page['id']) ?></td>
                                <td><?= esc($page['menu_id']) ?></td>
                                <td><?= esc($page['title_destaque1']) ?></td>
                                <td>
                                    <a href="/admin/pages/edit/<?= $page['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="/admin/pages/delete/<?= $page['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta página?');">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>
