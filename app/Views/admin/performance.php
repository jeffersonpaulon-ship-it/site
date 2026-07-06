<?= $this->include('admin/partials/headeradmin') ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid pt-3">
            <h1>📊 Painel de Performance Técnico e SEO Mobile</h1>
            <p class="text-muted">Análise em tempo real dos arquivos do servidor que impactam o carregamento mobile (7.63s).</p>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body">
                            <h6 class="text-uppercase text-primary font-weight-bold">Pasta de Uploads</h6>
                            <h3 class="font-weight-bold text-dark"><?= $totalUploadsMb ?> MB</h3>
                            <small class="text-muted">Peso acumulado de mídias</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body">
                            <h6 class="text-uppercase text-success font-weight-bold">Memória PHP RAM</h6>
                            <h3 class="font-weight-bold text-dark"><?= $memoryUsage ?></h3>
                            <small class="text-muted">Consumo desta requisição</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body">
                            <h6 class="text-uppercase text-warning font-weight-bold">Cache Ativo</h6>
                            <h3 class="font-weight-bold text-dark"><?= $cacheSizeKb ?> KB</h3>
                            <small class="text-muted">Arquivos temporários do CI4</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-danger">
                        <div class="card-header bg-danger text-white">
                            <h5 class="card-title mb-0 font-weight-bold">🚨 Diagnóstico de Imagens com mais de 200 KB</h5>
                        </div>
                        <div class="card-body">
                            <?php if (empty($heavyImages)): ?>
                                <div class="alert alert-success mb-0">
                                    🎉 <strong>Excelente!</strong> Nenhuma imagem acima de 200 KB foi localizada nas pastas mapeadas. Seu front-end está leve para o celular!
                                </div>
                            <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Origem / Categoria</th>
                                                <th>Nome do Arquivo</th>
                                                <th>Peso Atual (KB)</th>
                                                <th>Status SEO Mobile</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($heavyImages as $img): ?>
                                                <tr>
                                                    <td><strong><?= $img['category'] ?></strong></td>
                                                    <td><code class="text-dark"><?= $img['filename'] ?></code></td>
                                                    <td class="font-weight-bold text-danger"><?= $img['size'] ?> KB</td>
                                                    <td>
                                                        <span class="badge badge-<?= $img['size'] > 500 ? 'danger' : 'warning' ?> px-2 py-1">
                                                            <?= $img['status'] ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="alert alert-info mt-3 mb-0">
                                    💡 <strong>Como corrigir esses itens?</strong> Baixe as imagens listadas acima pelo FTP ou Gerenciador da Hostinger, otimize-as em ferramentas como o <em>TinyPNG</em> ou converta para <strong>.webp</strong>, e suba-as novamente com o mesmo nome de arquivo. Isso vai derrubar o tempo mobile instantaneamente!
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card shadow-sm border-warning">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="card-title mb-0 font-weight-bold">📦 Auditoria de Desperdício de Assets (CSS e JS) por Página</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted small">Cruzamento de dependências em tempo real. Lista completa de arquivos que estão inflando o cabeçalho e rodapé em rotas desnecessárias do site.</p>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Página / Rota do Site</th>
                                            <th class="text-center">CSS Ativos / Inúteis</th>
                                            <th class="text-center">JS Ativos / Inúteis</th>
                                            <th>Arquivos Desperdiçados Carregados em Segundo Plano</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($analisePaginas as $nomePagina => $dados): ?>
                                            <tr>
                                                <td style="width: 25%;">
                                                    <h6 class="font-weight-bold text-primary mb-0"><?= $nomePagina ?></h6>
                                                    <small class="text-muted d-block mt-1"><em>Uso real: <?= $dados['obs'] ?></em></small>
                                                </td>
                                                <td class="text-center align-middle" style="width: 15%;">
                                                    <span class="text-success font-weight-bold"><?= $dados['css_utilizados'] ?></span>
                                                    / 
                                                    <span class="text-danger font-weight-bold"><?= count($dados['css_inuteis']) ?></span>
                                                </td>
                                                <td class="text-center align-middle" style="width: 15%;">
                                                    <span class="text-success font-weight-bold"><?= $dados['js_utilizados'] ?></span>
                                                    / 
                                                    <span class="text-danger font-weight-bold"><?= count($dados['js_inuteis']) ?></span>
                                                </td>
                                                <td style="width: 45%;">
                                                    <div class="mb-1"><span class="badge badge-secondary">CSS Inúteis nesta Rota (Remover daqui):</span></div>
                                                    <div class="text-muted small mb-3">
                                                        <?php if(!empty($dados['css_inuteis'])): ?>
                                                            <?php foreach($dados['css_inuteis'] as $css): ?>
                                                                <code class="text-danger" style="display: inline-block; margin: 2px; background: #fff5f5; padding: 2px 4px; border: 1px solid #ffd8d8; border-radius: 3px;"><?= $css ?></code>
                                                            <?php endforeach; ?>
                                                        <?php else: ?>
                                                            <span class="text-success font-weight-bold">🎉 Nenhum. Rota 100% limpa!</span>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="mb-1"><span class="badge badge-secondary">JS Inúteis nesta Rota (Remover daqui):</span></div>
                                                    <div class="text-muted small">
                                                        <?php if(!empty($dados['js_inuteis'])): ?>
                                                            <?php foreach($dados['js_inuteis'] as $js): ?>
                                                                <code class="text-danger" style="display: inline-block; margin: 2px; background: #fff5f5; padding: 2px 4px; border: 1px solid #ffd8d8; border-radius: 3px;"><?= $js ?></code>
                                                            <?php endforeach; ?>
                                                        <?php else: ?>
                                                            <span class="text-success font-weight-bold">🎉 Nenhum. Rota 100% limpa!</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="alert alert-warning mt-3 mb-0 small">
                                📌 <strong>Estratégia Técnica de Correção:</strong> Modifique o <code>Views/partials/header.php</code> e o <code>footer.php</code> para aceitarem arrays dinâmicos de arquivos (ex: <code>$styles_especificos</code> e <code>$scripts_especificos</code>). Depois, basta injetar em cada método do seu Controller público unicamente o que a página utiliza, salvando banda móvel e reduzindo o tempo de carregamento de 7.63s para a casa de 1.5s!
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>