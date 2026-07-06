<?= $this->include('admin/partials/headeradmin') ?>
    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/0twqjqe7g3deul57ibemmv69khjs1rj0ao7w71x5dvk4qs49/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#text1, textarea#text2, textarea#text3, textarea#text4, textarea#text5',
            height: 300,
            plugins: 'lists link image preview anchor code',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image code',
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();  // Sincroniza o conteúdo com o textarea
                });
            }
        });
    </script>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <h1><?= isset($page) ? 'Editar Página' : 'Criar Nova Página' ?></h1>

            <form action="<?= isset($page) ? '/admin/pages/update/' . $page['id'] : '/admin/pages/store' ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <!-- Campo Menu ID -->
                <div class="form-group">
                    <label for="menu_id">Menu ID</label>
                    <input type="text" name="menu_id" class="form-control" id="menu_id" value="<?= isset($page) ? esc($page['menu_id']) : old('menu_id') ?>" required>
                </div>

                <!-- Campo Background (Imagem de Fundo) -->
                <div class="form-group">
                    <label for="background">Imagem de Fundo</label>
                    <input type="file" name="background" class="form-control" id="background">
                    <?php if (isset($page) && $page['background']): ?>
                        <img src="/uploads/<?= esc($page['background']) ?>" alt="Imagem de Fundo" width="200">
                    <?php endif; ?>
                </div>

                <!-- Campo Photo Destaque -->
                <div class="form-group">
                    <label for="photo_destaque">Foto Destaque</label>
                    <input type="text" name="photo_destaque" class="form-control" id="photo_destaque" value="<?= isset($page) ? esc($page['photo_destaque']) : old('photo_destaque') ?>">
                </div>

                <!-- Campo Content -->
                <div class="form-group">
                    <label for="content">Conteúdo</label>
                    <textarea name="content" class="form-control" id="content"><?= isset($page) ? esc($page['content']) : old('content') ?></textarea>
                </div>

                <!-- Campo Gallery ID -->
                <div class="form-group">
                    <label for="gallery_id">ID da Galeria</label>
                    <input type="text" name="gallery_id" class="form-control" id="gallery_id" value="<?= isset($page) ? esc($page['gallery_id']) : old('gallery_id') ?>">
                </div>

                <!-- Campo Título Destaque 1 -->
                <div class="form-group">
                    <label for="title_destaque1">Título Destaque 1</label>
                    <input type="text" name="title_destaque1" class="form-control" id="title_destaque1" value="<?= isset($page) ? esc($page['title_destaque1']) : old('title_destaque1') ?>" required>
                </div>

                <!-- Campo Text1 com TinyMCE -->
                <div class="form-group">
                    <label for="text1">Texto 1</label>
                    <textarea name="text1" class="form-control" id="text1"><?= isset($page) ? esc($page['text1']) : old('text1') ?></textarea>
                </div>

                <!-- Campo Título Destaque 2 -->
                <div class="form-group">
                    <label for="title_destaque2">Título Destaque 2</label>
                    <input type="text" name="title_destaque2" class="form-control" id="title_destaque2" value="<?= isset($page) ? esc($page['title_destaque2']) : old('title_destaque2') ?>">
                </div>

                <!-- Campo Text2 com TinyMCE -->
                <div class="form-group">
                    <label for="text2">Texto 2</label>
                    <textarea name="text2" class="form-control" id="text2"><?= isset($page) ? esc($page['text2']) : old('text2') ?></textarea>
                </div>

                <!-- Campo Título Benefícios -->
                <div class="form-group">
                    <label for="title_beneficios">Título Benefícios</label>
                    <input type="text" name="title_beneficios" class="form-control" id="title_beneficios" value="<?= isset($page) ? esc($page['title_beneficios']) : old('title_beneficios') ?>">
                </div>

                <!-- Campo Texto Benefícios -->
                <div class="form-group">
                    <label for="text_beneficios">Texto Benefícios</label>
                    <textarea name="text_beneficios" class="form-control" id="text_beneficios"><?= isset($page) ? esc($page['text_beneficios']) : old('text_beneficios') ?></textarea>
                </div>

                <!-- Campo Photo Benefícios -->
                <div class="form-group">
                    <label for="photo_beneficios">Foto Benefícios</label>
                    <input type="text" name="photo_beneficios" class="form-control" id="photo_beneficios" value="<?= isset($page) ? esc($page['photo_beneficios']) : old('photo_beneficios') ?>">
                </div>

                <!-- Campo Text3 com TinyMCE -->
                <div class="form-group">
                    <label for="text3">Texto 3</label>
                    <textarea name="text3" class="form-control" id="text3"><?= isset($page) ? esc($page['text3']) : old('text3') ?></textarea>
                </div>

                <!-- Campo Text4 com TinyMCE -->
                <div class="form-group">
                    <label for="text4">Texto 4</label>
                    <textarea name="text4" class="form-control" id="text4"><?= isset($page) ? esc($page['text4']) : old('text4') ?></textarea>
                </div>

                <!-- Campo Text5 com TinyMCE -->
                <div class="form-group">
                    <label for="text5">Texto 5</label>
                    <textarea name="text5" class="form-control" id="text5"><?= isset($page) ? esc($page['text5']) : old('text5') ?></textarea>
                </div>

                <!-- Campo Partials1 (Escolha do usuário) -->
                <div class="form-group">
                    <label for="partials1">Parciais 1</label>
                    <select name="partials1" class="form-control" id="partials1">
                        <option value="1" <?= isset($page) && $page['partials1'] == 1 ? 'selected' : '' ?>>Opção 1</option>
                        <option value="2" <?= isset($page) && $page['partials1'] == 2 ? 'selected' : '' ?>>Opção 2</option>
                        <option value="3" <?= isset($page) && $page['partials1'] == 3 ? 'selected' : '' ?>>Opção 3</option>
                    </select>
                </div>

                <!-- Campo Partials2 (Escolha do usuário) -->
                <div class="form-group">
                    <label for="partials2">Parciais 2</label>
                    <select name="partials2" class="form-control" id="partials2">
                        <option value="1" <?= isset($page) && $page['partials2'] == 1 ? 'selected' : '' ?>>Opção 1</option>
                        <option value="2" <?= isset($page) && $page['partials2'] == 2 ? 'selected' : '' ?>>Opção 2</option>
                        <option value="3" <?= isset($page) && $page['partials2'] == 3 ? 'selected' : '' ?>>Opção 3</option>
                    </select>
                </div>

                <!-- Campo Partials3 (Escolha do usuário) -->
                <div class="form-group">
                    <label for="partials3">Parciais 3</label>
                    <select name="partials3" class="form-control" id="partials3">
                        <option value="1" <?= isset($page) && $page['partials3'] == 1 ? 'selected' : '' ?>>Opção 1</option>
                        <option value="2" <?= isset($page) && $page['partials3'] == 2 ? 'selected' : '' ?>>Opção 2</option>
                        <option value="3" <?= isset($page) && $page['partials3'] == 3 ? 'selected' : '' ?>>Opção 3</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary"><?= isset($page) ? 'Atualizar' : 'Salvar' ?></button>
            </form>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>