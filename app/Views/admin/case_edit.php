<?= $this->include('admin/partials/headeradmin') ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Editar Case</h1>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/cases/update/' . $case['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?= old('title', $case['title']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug (URL Amigável)</label>
                            <input type="text" name="slug" class="form-control" id="slug" value="<?= old('slug', $case['slug']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="client">Cliente</label>
                            <input type="text" name="client" class="form-control" id="client" value="<?= old('client', $case['client']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <input type="text" name="category" class="form-control" id="category" value="<?= old('category', $case['category']) ?>" required>
                            <small class="form-text text-muted">Ex: Credenciamento, Controle de Acesso, Caex, Outros</small>
                        </div>

                        <div class="form-group">
                            <label for="project_date">Data do Evento</label>
                            <input type="date" name="project_date" class="form-control" id="project_date" value="<?= old('project_date', $case['project_date']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="instagram">Usuário do Instagram</label>
                            <input type="text" name="instagram" class="form-control" id="instagram" value="<?= old('instagram', $case['instagram']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="keywords">Palavras-chave (SEO)</label>
                            <input type="text" name="keywords" class="form-control" id="keywords" value="<?= old('keywords', $case['keywords']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição Principal</label>
                            <textarea name="description" class="form-control" id="description" rows="4"><?= old('description', $case['description']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="description2">Descrição 2</label>
                            <textarea name="description2" class="form-control" id="description2" rows="3"><?= old('description2', $case['description2']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="titulo2">Título do Destaque 1</label>
                            <input type="text" name="titulo2" class="form-control" id="titulo2" value="<?= old('titulo2', $case['titulo2']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="description3">Texto do Destaque 1</label>
                            <textarea name="description3" class="form-control" id="description3" rows="2"><?= old('description3', $case['description3']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="titulo3">Título do Destaque 2</label>
                            <input type="text" name="titulo3" class="form-control" id="titulo3" value="<?= old('titulo3', $case['titulo3']) ?>">
                        </div>

                        <div class="form-group">
                            <label for="description4">Texto do Destaque 2</label>
                            <textarea name="description4" class="form-control" id="description4" rows="2"><?= old('description4', $case['description4']) ?></textarea>
                        </div>

                        <hr>
                        <h5>Imagens</h5>
                        <p class="text-muted">Envie um arquivo apenas se quiser substituir a imagem atual.</p>

                        <?php
                        $imageFields = [
                            'image_site'       => 'Imagem da Listagem (Home / Cases)',
                            'image_banner'     => 'Imagem de Fundo do Cabeçalho',
                            'featured_image'   => 'Imagem em Destaque (Topo da Página)',
                            'carousel_image_1' => 'Foto do Evento 1',
                            'carousel_image_2' => 'Foto do Evento 2',
                            'carousel_image_3' => 'Foto do Evento 3',
                            'carousel_image_4' => 'Foto do Evento 4',
                            'carousel_image_5' => 'Foto do Evento 5',
                            'carousel_image_6' => 'Foto do Evento 6',
                        ];
                        ?>

                        <?php foreach ($imageFields as $field => $label): ?>
                            <div class="form-group">
                                <label for="<?= $field ?>"><?= $label ?></label>
                                <?php if (!empty($case[$field])): ?>
                                    <div class="mb-2">
                                        <img src="<?= base_url('assets/images/cases/' . esc($case[$field])) ?>" alt="<?= $label ?>" style="max-height: 80px;">
                                    </div>
                                <?php endif; ?>
                                <input type="file" name="<?= $field ?>" class="form-control" id="<?= $field ?>" accept="image/*">
                            </div>
                        <?php endforeach; ?>

                        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>
