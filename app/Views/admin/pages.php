<?= $this->include('admin/partials/headeradmin') ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1>Gerenciar Páginas</h1>

            <a href="/admin/pages/create" class="btn btn-primary mb-3">Adicionar Nova Página</a>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pages as $page): ?>
                    <tr>
                        <td><?= $page['id'] ?></td>
                        <td><?= esc($page['title_destaque1']) ?></td>
                        <td>
                            <a href="/admin/pages/edit/<?= $page['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/admin/pages/delete/<?= $page['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>
