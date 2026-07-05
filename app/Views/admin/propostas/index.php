<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Gerenciar Propostas</h1>

                    <!-- Botão de adicionar novo item -->
                    <a href="<?= site_url('admin/propostas/create') ?>" class="btn btn-primary float-right">Criar Nova Proposta</a>

                    <!-- Tabela de listagem -->
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nº Proposta</th>
                            <th>Nome do Evento</th>
                            <th>Data do Evento</th>
                            <th>Solicitante</th>
                            <th>Valor Total</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                             <?php foreach ($propostas as $proposta): ?>
                                <tr>
                                    <td><?= esc($proposta['numero']) ?></td>
                                    <td><?= esc($proposta['nome_evento']) ?></td>
                                    <td><?= date('d/m/Y', strtotime($proposta['data_evento'])) ?></td>
                                    <td><?= esc($proposta['nome_solicitante']) ?></td>
                                    <td>R$ <?= number_format($proposta['valor_total'], 2, ',', '.') ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/propostas/view/' . $proposta['id']) ?>" class="btn btn-info btn-sm">Ver</a>
                                        <a href="<?= site_url('admin/propostas/edit/' . $proposta['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="<?= site_url('admin/propostas/delete/' . $proposta['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta proposta?')">Excluir</a>
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