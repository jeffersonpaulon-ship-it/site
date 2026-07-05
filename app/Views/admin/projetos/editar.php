<?= $this->include('admin/partials/headeradmin') ?> <div class="content-wrapper" style="padding: 20px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Projeto: <?= esc($projeto['project_name']) ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <form action="<?= base_url('admin/projetos/atualizar/' . $projeto['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-7">
                    <div class="card card-primary">
                        <div class="card-header bg-dark">
                            <h3 class="card-title">Conteúdo do Projeto</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Nome do Projeto / Evento</label>
                                <input type="text" name="project_name" class="form-control" value="<?= esc($projeto['project_name']) ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>URL Amigável (Slug)</label>
                                <input type="text" name="slug" class="form-control" value="<?= esc($projeto['slug']) ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>Nome do Cliente</label>
                                    <input type="text" name="client_name" class="form-control" value="<?= esc($projeto['client_name']) ?>">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>Categoria do Serviço</label>
                                    <input type="text" name="category" class="form-control" value="<?= esc($projeto['category']) ?>" placeholder="Ex: Controle de Acesso" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Título H1 da Página (Foco SEO)</label>
                                <input type="text" name="seo_h1" class="form-control" value="<?= esc($projeto['seo_h1'] ?? '') ?>" placeholder="Ex: Credenciamento Digital Inteligente no Lollapalooza">
                            </div>
                            <div class="form-group mb-3">
                                <label>Texto Descritivo / Caso de Sucesso (HTML)</label>
                                <textarea name="content_html" class="form-control" rows="8" placeholder="Escreva o texto do desafio, soluções aplicadas e resultados obtidos..."><?= esc($projeto['content_html'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card card-secondary mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Imagens Otimizadas</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Imagem Panorâmica de Fundo (1920x560)</label>
                                <input type="file" name="image_bg" class="form-control" accept="image/*">
                                <small class="text-muted d-block mt-1">Atual: <?= esc($projeto['image_bg'] ?? 'padrão do site') ?></small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Imagem de Destaque Principal (1170x520)</label>
                                <input type="file" name="image_destaque" class="form-control" accept="image/*">
                                <small class="text-muted d-block mt-1">Atual: <?= esc($projeto['image_destaque'] ?? $projeto['images'] ?? 'padrão do site') ?></small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Galeria de Fotos Extras (3 a 6 fotos - 370x440)</label>
                                <input type="file" name="galeria_fotos[]" class="form-control" accept="image/*" multiple>
                                <small class="text-muted">Pode selecionar múltiplos ficheiros em conjunto.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card card-success">
                        <div class="card-header bg-success text-white">
                            <h3 class="card-title"><i class="fas fa-search"></i> Configuração de SEO (Meta Tags)</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Meta Title (Título na aba do Google)</label>
                                <input type="text" name="seo_title" class="form-control" value="<?= esc($projeto['seo_title'] ?? '') ?>" placeholder="Máximo 60 caracteres">
                            </div>
                            <div class="form-group mb-3">
                                <label>Meta Description (Resumo no Google)</label>
                                <textarea name="seo_description" class="form-control" rows="4" placeholder="Máximo 160 caracteres contendo palavras chaves fortes."><?= esc($projeto['seo_description'] ?? '') ?></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Keywords (Separadas por vírgula)</label>
                                <input type="text" name="seo_keywords" class="form-control" value="<?= esc($projeto['seo_keywords'] ?? '') ?>" placeholder="Ex: credenciamento lollapalooza, controle de acesso rfid">
                            </div>
                            
                            <div class="alert alert-info mt-4">
                                <h5><i class="icon fas fa-info"></i> Dica de SEO Técnico</h5>
                                <p class="small mb-0">Preencher estes campos garante que a página do evento seja listada de forma independente e profissional nos resultados ricos do Google, gerando mais autoridade orgânica para o domínio principal.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card card-body text-end mt-3 d-flex flex-row justify-content-end gap-2">
                        <a href="<?= base_url('admin/projetos') ?>" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar Alterações</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>