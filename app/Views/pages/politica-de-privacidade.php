<?= $this->include('partials/header') ?>
<div class="page-wrapper">
    <header class="main-header clearfix">
        <?= $this->include('partials/menu') ?>
    </header>
    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div>
    </div>

    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(<?= base_url('assets/images/backgrounds/contato-csf-bg.jpg') ?>)">
        </div>
        <div class="page-header-border"></div>
        <div class="page-header-border page-header-border-two"></div>
        <div class="page-header-border page-header-border-three"></div>
        <div class="page-header-border page-header-border-four"></div>
        <div class="page-header-border page-header-border-five"></div>
        <div class="page-header-border page-header-border-six"></div>

        <div class="page-header-shape-1"></div>
        <div class="page-header-shape-2"></div>
        <div class="page-header-shape-3"></div>

        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li class="active">Política de Privacidade</li>
                </ul>
                <h1>Política de Privacidade</h1>
            </div>
        </div>
    </section>
    <section class="privacy-policy-page py-5" style="background-color: #ffffff;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 text-start">
                    <div class="section-title text-start mb-4">
                        <span class="section-title__tagline">Segurança e LGPD</span>
                        <h2 class="section-title__title" style="font-size: 2.2rem;">Como protegemos os seus dados</h2>
                    </div>

                    <div class="privacy-content text-muted" style="font-size: 16px; line-height: 1.8; color: #555;">
                        <p>A sua privacidade é de extrema importância para nós. No <strong>Credenciamento Sem Fila (CSF)</strong>, temos o compromisso de respeitar a sua privacidade e proteger os dados pessoais coletados tanto através do nosso site institucional quanto por meio de nossos sistemas próprios de credenciamento e controle de fluxo em feiras, congressos e eventos corporativos.</p>

                        <h3 class="text-dark mt-4 mb-2" style="font-size: 1.4rem; font-weight: 700;">1. Informações que Coletamos</h3>
                        <p>Coletamos informações estritamente necessárias para a prestação de nossos serviços de automação e controle de acesso, que podem incluir:</p>
                        <ul>
                            <li><strong>Dados de Contato Institucional:</strong> Nome, e-mail, telefone, cargo e empresa fornecidos voluntariamente em nossos formulários de orçamento comerciais.</li>
                            <li><strong>Dados de Credenciamento (Operação de Eventos):</strong> Nome completo, CPF, e-mail, empresa e, quando explicitamente exigido pelo organizador do evento, captura de foto para validação de segurança facial nas portarias e catracas.</li>
                            <li><strong>Dados de Navegação:</strong> Informações IP, cookies essenciais e dados estatísticos de comportamento de navegação recolhidos de forma automatizada para otimização da performance da página.</li>
                        </ul>

                        <h3 class="text-dark mt-4 mb-2" style="font-size: 1.4rem; font-weight: 700;">2. Finalidade do Tratamento de Dados</h3>
                        <p>Os dados coletados são tratados em estrita conformidade com a Lei Geral de Proteção de Dados (LGPD - Lei nº 13.709/2018) para as seguintes finalidades:</p>
                        <ul>
                            <li>Garantir a triagem rápida, agilidade na emissão de crachás e tempo zero de fila na entrada dos eventos operados por nossa tecnologia.</li>
                            <li>Processar de forma segura as requisições de orçamentos e contatos comerciais.</li>
                            <li>Prevenir fraudes e transferências indevidas de credenciais nominais através de validação rigorosa em tempo real.</li>
                            <li>Gerar relatórios estatísticos e pós-evento consolidados e anonimizados para as produtoras contratantes organizadoras.</li>
                        </ul>

                        <h3 class="text-dark mt-4 mb-2" style="font-size: 1.4rem; font-weight: 700;">3. Compartilhamento e Retenção de Dados</h3>
                        <p>O Credenciamento Sem Fila não comercializa, vende ou aluga dados pessoais a terceiros. Os dados coletados em eventos são compartilhados exclusivamente com a produtora/organizadora responsável por aquele evento específico, sob regras contratuais rígidas de confidencialidade.</p>
                        <p>Os dados permanecem armazenados em nossos servidores seguros (com backups em nuvens de alta performance) apenas pelo tempo necessário para cumprir as obrigações contratuais, legais e de auditoria de cada projeto.</p>

                        <h3 class="text-dark mt-4 mb-2" style="font-size: 1.4rem; font-weight: 700;">4. Segurança da Informação</h3>
                        <p>Implementamos medidas técnicas e administrativas avançadas para proteger os seus dados contra acessos não autorizados, perdas, alterações ou qualquer forma de tratamento inadequado. Nossos sistemas rodam sob protocolos criptografados e com níveis restritos de privilégios para operadores e staffs.</p>

                        <h3 class="text-dark mt-4 mb-2" style="font-size: 1.4rem; font-weight: 700;">5. Seus Direitos</h3>
                        <p>Como titular dos dados pessoais, você possui o direito de, a qualquer momento, solicitar a confirmação da existência do tratamento, o acesso aos seus dados, a correção de informações desatualizadas ou a eliminação definitiva de registros (salvo em casos de obrigatoriedade legal de retenção por parte do controlador).</p>
                        <p>Para exercer seus direitos ou esclarecer dúvidas sobre esta política, envie uma mensagem para o nosso comitê de privacidade através do e-mail: <a href="mailto:comercial@credenciamentosemfila.com.br" style="color: var(--thm-primary, #ff5e14); font-weight: 600;">comercial@credenciamentosemfila.com.br</a>.</p>

                        <hr class="my-4" style="border-color: #eee;">
                        <p class="small text-muted">Esta política é revisada periodicamente e foi atualizada em conformidade com as diretrizes vigentes de segurança digital corporativa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
<?= $this->include('partials/footer') ?>