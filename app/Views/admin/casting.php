<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Gerenciar Casting</h1>
                <!-- Tabela de listagem -->
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Função Pretendida</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                       <tbody>
                           <?php foreach ($casting as $pessoa): ?>
                           <tr>
                               <td>
                                    <?php if (!empty($pessoa['foto_perfil_1'])): ?>
                                        <img src="<?= base_url('uploads/trabalheconosco/' . $pessoa['foto_perfil_1']) ?>" alt="Foto de <?= esc($pessoa['nome']) ?>" class="img-thumbnail" style="max-width: 50px;">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/img/no-image.png') ?>" alt="Sem foto" class="img-thumbnail" style="max-width: 50px;">
                                    <?php endif; ?>
                                </td>
                               <td><?= esc($pessoa['nome']) ?></td>
                               <td><?= esc($pessoa['sobrenome']) ?></td>
                               <td><?= esc($pessoa['email']) ?></td>
                               <td><?= esc($pessoa['celular']) ?></td>
                               <td><?= esc($pessoa['funcao_pretendida']) ?></td>
                               <td>
                                   <a href="<?= base_url('admin/casting/view/' . $pessoa['id']) ?>" class="btn btn-sm btn-info">Ver</a>
                                   <a href="<?= base_url('admin/casting/edit/' . $pessoa['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                                   <a href="<?= base_url('admin/casting/delete/' . $pessoa['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este registro?')">Excluir</a>
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



