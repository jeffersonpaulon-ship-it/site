<?= $this->include('admin/partials/headeradmin') ?>
<!-- Adicionando o TinyMCE -->
<script src="https://cdn.tiny.cloud/1/0twqjqe7g3deul57ibemmv69khjs1rj0ao7w71x5dvk4qs49/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',  // Seletor do textarea que você deseja transformar em editor TinyMCE
        height: 300,  // Altura do editor
        plugins: 'lists link image preview anchor code',  // Plugins básicos que você quer adicionar
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image code',
        content_css: '//www.tiny.cloud/css/codepen.min.css',  // CSS padrão para o conteúdo do TinyMCE
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();  // Isso garante que o conteúdo seja sincronizado com o textarea antes de enviar o formulário
            });
        }
    });
</script>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Criar Blog</h1>
                    <form action="<?= base_url('admin/blog/store') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?> <!-- Adiciona o campo CSRF automaticamente -->
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Slug (URL Amigável)</label>
                            <input type="text" name="slug" class="form-control" id="slug" required>
                        </div>

                        <div class="form-group">
                            <label for="author">Autor</label>
                            <input type="text" name="author" class="form-control" id="author" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <input type="text" name="category" class="form-control" id="category" required>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtítulo</label>
                            <input type="text" name="subtitle" class="form-control" id="subtitle" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Conteúdo</label>
                            <textarea name="content" class="form-control" id="content" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="main_image">Imagem Principal</label>
                            <input type="file" name="main_image" class="form-control" id="main_image" accept="image/*" required>
                        </div>

                        <div class="form-group">
                            <label for="additional_images">Imagens Adicionais</label>
                            <input type="file" name="additional_images[]" class="form-control" id="additional_images" accept="image/*" multiple>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>
