<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Gerenciar Fotos</h1>

                    <!-- Botão de adicionar novo item -->
                    <a href="/admin/photo/create" class="btn btn-success mb-3">Adicionar Nova Foto</a>

                    <!-- Tabela de listagem -->
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= $item['project_name'] ?></td>
                                <td>
                                    <!-- Botões de ação -->
                                    <a href="/admin/photo/edit/<?= $item['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="/admin/photo/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este item?');">Excluir</a>
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
