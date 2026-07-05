<?= $this->include('admin/partials/headeradmin') ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Detalhes do Casting</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php if (!empty($pessoa['foto_perfil_1'])): ?>
                                        <img src="<?= base_url('uploads/trabalheconosco/' . $pessoa['foto_perfil_1']) ?>" alt="Foto de <?= esc($pessoa['nome']) ?>" class="img-fluid">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/img/no-image.png') ?>" alt="Sem foto" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8">
                                    <h2><?= esc($pessoa['nome']) ?> <?= esc($pessoa['sobrenome']) ?></h2>
                                    <p><strong>Email:</strong> <?= esc($pessoa['email']) ?></p>
                                    <p><strong>Celular:</strong> <?= esc($pessoa['celular']) ?></p>
                                    <p><strong>Função Pretendida:</strong> <?= esc($pessoa['funcao_pretendida']) ?></p>
                                    <p><strong>Data de Nascimento:</strong> <?= date('d/m/Y', strtotime($pessoa['data_nascimento'])) ?></p>
                                    <p><strong>Endereço:</strong> <?= esc($pessoa['endereco']) ?>, <?= esc($pessoa['numero']) ?> - <?= esc($pessoa['bairro']) ?>, <?= esc($pessoa['cidade']) ?>/<?= esc($pessoa['uf']) ?></p>
                                    <p><strong>Possui Veículo:</strong> <?= $pessoa['possui_veiculo'] ? 'Sim' : 'Não' ?></p>
                                    <p><strong>Idiomas:</strong> <?= esc($pessoa['idiomas']) ?></p>
                                    <p><strong>MEI:</strong> <?= $pessoa['mei'] ? 'Sim' : 'Não' ?></p>
                                    <?php if ($pessoa['mei'] === 'sim'): ?>
                                        <p><strong>CNPJ:</strong> <?= esc($pessoa['cnpj']) ?></p>
                                    <?php endif; ?>
                                    <p><strong>CPF:</strong> <?= esc($pessoa['cpf']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url('admin/casting') ?>" class="btn btn-primary mt-3">Voltar</a>
                    <a href="<?= base_url('admin/casting/edit/' . $pessoa['id']) ?>" class="btn btn-warning mt-3">Editar</a>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>