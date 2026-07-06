<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Gerenciar Produtos e Serviços</h1>

                    <!-- Botão de adicionar novo item -->
                    <a href="<?= site_url('admin/produtos-servicos/create') ?>" class="btn btn-primary float-right">Criar Novo Item</a>

                    <!-- Tabela de listagem -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço Diária</th>
                                <th>Ano Utilização</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos_servicos as $item): ?>
                                <tr>
                                    <td><?= esc($item['nome']) ?></td>
                                    <td>R$ <?= number_format($item['preco_diaria'], 2, ',', '.') ?></td>
                                    <td><?= esc($item['ano_utilizacao']) ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/produtos-servicos/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="<?= site_url('admin/produtos-servicos/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este item?')">Excluir</a>
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