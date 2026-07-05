<?= $this->include('admin/partials/headeradmin') ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Editar Blog</h1>
                    <form action="/admin/blog/update/<?= $blog['id'] ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>  <!-- Token CSRF -->
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="form-control" id="title" value="<?= esc($blog['title']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug (URL Amigável)</label>
                            <input type="text" name="slug" class="form-control" id="slug" value="<?= esc($blog['slug']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="author">Autor</label>
                            <input type="text" name="author" class="form-control" id="author" value="<?= esc($blog['author']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <input type="text" name="category" class="form-control" id="category" value="<?= esc($blog['category']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtítulo</label>
                            <input type="text" name="subtitle" class="form-control" id="subtitle" value="<?= esc($blog['subtitle']) ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Conteúdo</label>
                            <textarea name="content" class="form-control" id="content" rows="4" required><?= esc($blog['content']) ?></textarea>
                        </div>

                        <?php if (!empty($blog['main_image'])): ?>
                            <div class="form-group">
                                <label>Imagem Principal Atual:</label>
                                <img src="<?= base_url('uploads/' . $blog['main_image']) ?>" alt="Imagem Atual" style="max-width: 200px;">
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="main_image">Substituir Imagem Principal</label>
                            <input type="file" name="main_image" class="form-control" id="main_image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="console.log('Formulário enviado!')">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>