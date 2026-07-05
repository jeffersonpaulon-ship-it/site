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
                    <h1><?= isset($page) ? 'Editar Página' : 'Adicionar Nova Página' ?></h1>
                    <form action="<?= isset($page) ? '/admin/pages/update/' . $page['id'] : '/admin/pages/store' ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="form-group">
                            <label for="menu_id">Menu ID</label>
                            <input type="text" class="form-control" id="menu_id" name="menu_id" value="<?= isset($page) ? esc($page['menu_id']) : '' ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="background">Background</label>
                            <input type="file" class="form-control" id="background" name="background">
                            <?php if (isset($page) && $page['background']): ?>
                                <img src="/uploads/pages/<?= esc($page['background']) ?>" width="150">
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="content">Conteúdo</label>
                            <textarea class="form-control" id="content" name="content" required><?= isset($page) ? esc($page['content']) : '' ?></textarea>
                        </div>

                        <!-- Outros campos como title_destaque1, text1, photo_destaque etc. seguem o mesmo padrão -->

                        <button type="submit" class="btn btn-success"><?= isset($page) ? 'Atualizar Página' : 'Criar Página' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>
