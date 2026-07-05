<?= $this->include('admin/partials/headeradmin') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1><?= isset($item) ? 'Editar Cliente' : 'Adicionar Cliente' ?></h1>

                    <?php if (isset($errors)): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= isset($item) ? base_url('admin/client/update/' . $item['id']) : base_url('admin/client/store') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="form-group mb-3">
                            <label for="client_name">Nome do Cliente</label>
                            <input type="text" class="form-control" id="client_name" name="client_name" value="<?= isset($item) ? esc($item['client_name']) : '' ?>" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="logo_image">Logo Imagem</label>
                            <input type="file" class="form-control" id="logo_image" name="logo_image">
                            <?php if (isset($item) && $item['logo_image']): ?>
                                <p class="mt-2 mb-1">Logo Atual:</p>
                                <img src="<?= base_url('uploads/clientes/' . esc($item['logo_image'])) ?>" alt="Logo atual" width="150" class="img-thumbnail">
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="logo_image_white">Logo Imagem (Versão Branca)</label>
                            <input type="file" class="form-control" id="logo_image_white" name="logo_image_white">
                            <?php if (isset($item) && $item['logo_image_white']): ?>
                                <p class="mt-2 mb-1">Logo Branco Atual:</p>
                                <img src="<?= base_url('uploads/clientes/' . esc($item['logo_image_white'])) ?>" alt="Logo Branco atual" width="150" class="img-thumbnail bg-dark p-2">
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-3">
                            <label for="order">Ordem de Exibição</label>
                            <input type="number" class="form-control" id="order" name="order" value="<?= isset($item) ? esc($item['order']) : '' ?>" required>
                        </div>

                        <button type="submit" class="btn btn-success mt-2"><?= isset($item) ? 'Atualizar Cliente' : 'Criar Cliente' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>