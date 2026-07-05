<?= $this->include('admin/partials/headeradmin') ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Criar Case</h1>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/cases/store') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?= old('title') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug (URL Amigável)</label>
                            <input type="text" name="slug" class="form-control" id="slug" value="<?= old('slug') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="client">Cliente</label>
                            <input type="text" name="client" class="form-control" id="client" value="<?= old('client') ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <input type="text" name="category" class="form-control" id="category" value="<?= old('category') ?>" required>
                            <small class="form-text text-muted">Ex: Credenciamento, Controle de Acesso, Caex, Outros</small>
                        </div>

                        <div class="form-group">
                            <label for="project_date">Data do Evento</label>
                            <input type="date" name="project_date" class="form-control" id="project_date" value="<?= old('project_date') ?>">
                        </div>

                        <div class="form-group">
                            <label for="instagram">Usuário do Instagram</label>
                            <input type="text" name="instagram" class="form-control" id="instagram" value="<?= old('instagram') ?>">
                        </div>

                        <div class="form-group">
                            <label for="keywords">Palavras-chave (SEO)</label>
                            <input type="text" name="keywords" class="form-control" id="keywords" value="<?= old('keywords') ?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição Principal</label>
                            <textarea name="description" class="form-control" id="description" rows="4"><?= old('description') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description1">Descrição Adicional</label>
                            <textarea name="description1" class="form-control" id="description1" rows="3"><?= old('description1') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description2">Descrição 2</label>
                            <textarea name="description2" class="form-control" id="description2" rows="3"><?= old('description2') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="titulo2">Título do Destaque 1</label>
                            <input type="text" name="titulo2" class="form-control" id="titulo2" value="<?= old('titulo2') ?>">
                        </div>

                        <div class="form-group">
                            <label for="description3">Texto do Destaque 1</label>
                            <textarea name="description3" class="form-control" id="description3" rows="2"><?= old('description3') ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="titulo3">Título do Destaque 2</label>
                            <input type="text" name="titulo3" class="form-control" id="titulo3" value="<?= old('titulo3') ?>">
                        </div>

                        <div class="form-group">
                            <label for="description4">Texto do Destaque 2</label>
                            <textarea name="description4" class="form-control" id="description4" rows="2"><?= old('description4') ?></textarea>
                        </div>

                        <hr>
                        <h5>Imagens</h5>

                        <div class="form-group">
                            <label for="image_site">Imagem da Listagem (Home / Cases)</label>
                            <input type="file" name="image_site" class="form-control" id="image_site" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="image_banner">Imagem de Fundo do Cabeçalho</label>
                            <input type="file" name="image_banner" class="form-control" id="image_banner" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="featured_image">Imagem em Destaque (Topo da Página)</label>
                            <input type="file" name="featured_image" class="form-control" id="featured_image" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="carousel_image_1">Foto do Evento 1</label>
                            <input type="file" name="carousel_image_1" class="form-control" id="carousel_image_1" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="carousel_image_2">Foto do Evento 2</label>
                            <input type="file" name="carousel_image_2" class="form-control" id="carousel_image_2" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="carousel_image_3">Foto do Evento 3</label>
                            <input type="file" name="carousel_image_3" class="form-control" id="carousel_image_3" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="carousel_image_4">Foto do Evento 4</label>
                            <input type="file" name="carousel_image_4" class="form-control" id="carousel_image_4" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="carousel_image_5">Foto do Evento 5</label>
                            <input type="file" name="carousel_image_5" class="form-control" id="carousel_image_5" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="carousel_image_6">Foto do Evento 6</label>
                            <input type="file" name="carousel_image_6" class="form-control" id="carousel_image_6" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>
