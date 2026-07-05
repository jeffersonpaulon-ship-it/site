<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Gerenciar Cases</h1>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <!-- Botão de adicionar novo item -->
                    <a href="<?= base_url('admin/cases/create') ?>" class="btn btn-success mb-3">Adicionar Novo Case</a>

                    <!-- Tabela de listagem -->
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Cliente</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td><?= esc($item['title']) ?></td>
                                <td><?= esc($item['client'] ?? '') ?></td>
                                <td><?= esc($item['category'] ?? '') ?></td>
                                <td>
                                    <!-- Botões de ação -->
                                    <a href="<?= base_url('admin/cases/edit/' . $item['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="<?= base_url('admin/cases/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este item?');">Excluir</a>
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
