<div class="container">
    <div class="section-title text-center">
        <span class="section-title__tagline">Nossos Cases de Sucesso</span>
        <h2 class="section-title__title">Projetos de Credenciamento e Controle de Acesso</h2>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <ul class="project-filter style1 post-filter has-dynamic-filters-counter list-unstyled">
                <li data-filter=".filter-item" class="active"><span class="filter-text">Todos</span></li>
                <li data-filter=".credenciamento"><span class="filter-text">Credenciamento</span></li>
                <li data-filter=".controle"><span class="filter-text">Controle de Acesso</span></li>
                <li data-filter=".caex"><span class="filter-text">Caex</span></li>
                <li data-filter=".outros"><span class="filter-text last-pd-none">Outros</span></li>
            </ul>
        </div>
    </div>
    
    <div class="row filter-layout" style="opacity: 1 !important; visibility: visible !important; display: flex !important; flex-wrap: wrap !important;">
        <?php if (!empty($galleryItems) && is_array($galleryItems)): ?>
            <?php foreach ($galleryItems as $case): ?>
                <?php 
                    $dbCategory = strtolower($case['category'] ?? '');
                    $filterClass = 'outros'; 
                    
                    if (strpos($dbCategory, 'credenciamento') !== false) {
                        $filterClass = 'credenciamento';
                    } elseif (strpos($dbCategory, 'controle') !== false) {
                        $filterClass = 'controle';
                    } elseif (strpos($dbCategory, 'caex') !== false) {
                        $filterClass = 'caex';
                    }

                    // Mapeamento direto das colunas do seu arquivo SQL
                    $tituloDoEvento = $case['project_name'] ?? 'Case de Sucesso';
                    $nomeDoCliente  = $case['client_name'] ?? $tituloDoEvento;
                    $linkSlug       = $case['slug'] ?? '';
                    $arquivoImagem  = $case['images'] ?? '';
                ?>
                
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item <?= $filterClass ?>" style="opacity: 1 !important; visibility: visible !important; position: relative !important;">
                    <div class="project-one__single" style="width: 100% !important; display: block !important;">
                        <div class="project-one__img" style="position: relative; display: block; width: 100%; overflow: hidden;">
                            
                            <?php if (!empty($arquivoImagem)): ?>
                                <img src="<?= base_url('assets/images/cases/' . esc($arquivoImagem)) ?>" alt="Case de Sucesso: <?= esc($tituloDoEvento) ?>" style="width: 100% !important; height: auto !important; display: block; object-fit: cover;">
                            <?php endif; ?>

                            <div class="project-one__hover">
                                <p class="project-one__tagline"><?= esc($case['category'] ?? 'Case de Sucesso') ?></p>
                                <h3 class="project-one__title">
                                    <a href="<?= base_url('case/' . esc($linkSlug)) ?>">
                                        <?= esc($nomeDoCliente) ?>
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
        
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="alert alert-info">Nenhum evento em portfólio indexado no momento.</p>
            </div>
        <?php endif; ?>
    </div>
</div>