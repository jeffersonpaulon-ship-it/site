<?= $this->include('partials/header') ?>
<div class="page-wrapper">
<header class="main-header clearfix">
    <?= $this->include('partials/menu') ?>
</header>
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div></div><section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/contato-csf-bg.jpg)">
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
                <li><a href="index.html">Home</a></li>
                <li class="active">contato</li>
            </ul>
            <h1>Contato - Credenciamento Sem Fila</h1>
        </div>
    </div>
</section>
<section class="contact-info" style="padding: 60px 0;">
    <div class="container">
        <div class="row mb-5">
            <div class="col-xl-12 text-start">
                <p class="contact-info__introduction" style="font-size: 18px; line-height: 1.8; color: #666; margin-bottom: 0;">
                    O <strong>Credenciamento Sem Fila</strong> desenvolve sistemas integrados voltados para o credenciamento de eventos corporativos, feiras, congressos e exposições. Contamos com uma infraestrutura robusta de equipamentos próprios, modernos e de alta performance. Nossa equipe está pronta para desenhar soluções sob medida que garantem tempo zero de fila, controle de acesso seguro e automação inteligente para organizadores e produtoras em todo o Brasil. Entre em contato conosco e solicite uma demonstração ou orçamento comercial.
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <div class="contact-info__single h-100">
                    <div class="contact-info__icon">
                        <span class="icon-conversation"></span>
                    </div>
                    <h3 class="contact-info__title">Quem Somos</h3>
                    <p class="contact-info__text">O Credenciamento Sem Fila desenvolve sistemas dinâmicos voltados ao credenciamento de eventos corporativos, contando com soluções de TI e equipamentos próprios e modernos.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                <div class="contact-info__single h-100">
                    <div class="contact-info__icon">
                        <span class="icon-address"></span>
                    </div>
                    <h3 class="contact-info__title">Endereço</h3>
                    <p class="contact-info__text">Estamos localizados na Av. das Nações Unidas, 14.171 - 15º Andar - Morumbi - São Paulo - SP. Próximo ao Shopping Morumbi. Venha nos visitar.</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                <div class="contact-info__single contact-info__single-last h-100">
                    <div class="contact-info__icon">
                        <span class="icon-contact"></span>
                    </div>
                    <h3 class="contact-info__title">Contatos</h3>
                    <div class="contact-info__channels" style="display: flex; flex-direction: column; gap: 8px; margin-top: 15px;">
                        <a href="mailto:comercial@credenciamentosemfila.com.br" class="contact-info__mail"><i class="fa fa-envelope me-2"></i>E-mail Comercial</a>
                        <a href="mailto:financeiro@credenciamentosemfila.com.br" class="contact-info__mail"><i class="fa fa-envelope me-2"></i>E-mail Financeiro</a>
                        <a href="mailto:suporte@credenciamentosemfila.com.br" class="contact-info__mail"><i class="fa fa-envelope me-2"></i>E-mail Suporte</a>
                        <a href="https://api.whatsapp.com/send?phone=5511992313401&text=quero%20mais%20informacoes" class="contact-info__phone btn btn-success text-white mt-2 w-100" target="_blank" style="border-radius: 5px; padding: 10px; font-weight: 600;"><i class="fab fa-whatsapp me-2"></i>WhatsApp Comercial</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-page contact-page-two" style="padding: 60px 0; background-color: #f9f9f9;">
    <div class="container">
        <div class="section-title text-start mb-5">
            <h2 class="section-title__title">Entre em Contato</h2>
        </div>
        
        <div id="message-container" style="display: none; padding: 15px; margin-bottom: 25px; border-radius: 5px; font-weight: 500;"></div>
        
        <?php if (session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xl-12">
                <div class="contact-page__form">
                    <form id="contact-form" action="<?= base_url('contato/submit') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <div class="row g-4">
                            <div class="col-xl-6 col-lg-6">
                                <div class="comment-form__input-box mb-0">
                                    <input type="text" class="form-control" placeholder="Seu nome" name="nome" value="<?= old('nome') ?>" style="height: 60px; padding: 0 20px;" required>
                                    <?php if (session('errors.nome')): ?>
                                        <small class="text-danger mt-1 d-block"><?= session('errors.nome') ?></small>
                                    <?php endif; ?>
                                    <small class="text-danger mt-1 d-block error-message" data-for="nome"></small>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="comment-form__input-box mb-0">
                                    <input type="text" class="form-control" placeholder="Sua empresa" name="empresa" style="height: 60px; padding: 0 20px;" value="<?= old('empresa') ?>">
                                    <?php if (session('errors.empresa')): ?>
                                        <small class="text-danger mt-1 d-block"><?= session('errors.empresa') ?></small>
                                    <?php endif; ?>
                                    <small class="text-danger mt-1 d-block error-message" data-for="empresa"></small>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="comment-form__input-box mb-0">
                                    <input type="text" class="form-control" placeholder="Seu cargo" name="cargo" style="height: 60px; padding: 0 20px;" value="<?= old('cargo') ?>">
                                    <?php if (session('errors.cargo')): ?>
                                        <small class="text-danger mt-1 d-block"><?= session('errors.cargo') ?></small>
                                    <?php endif; ?>
                                    <small class="text-danger mt-1 d-block error-message" data-for="cargo"></small>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="comment-form__input-box mb-0">
                                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="<?= old('email') ?>" style="height: 60px; padding: 0 20px;" required>
                                    <?php if (session('errors.email')): ?>
                                        <small class="text-danger mt-1 d-block"><?= session('errors.email') ?></small>
                                    <?php endif; ?>
                                    <small class="text-danger mt-1 d-block error-message" data-for="email"></small>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="comment-form__input-box mb-0">
                                    <input type="text" class="form-control" placeholder="Seu Telefone ou WhatsApp" name="telefone" value="<?= old('telefone') ?>" style="height: 60px; padding: 0 20px;" required>
                                    <?php if (session('errors.telefone')): ?>
                                        <small class="text-danger mt-1 d-block"><?= session('errors.telefone') ?></small>
                                    <?php endif; ?>
                                    <small class="text-danger mt-1 d-block error-message" data-for="telefone"></small>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="comment-form__input-box mb-0">
                                    <input type="text" class="form-control" placeholder="Site do evento" name="site" style="height: 60px; padding: 0 20px;" value="<?= old('site') ?>">
                                    <?php if (session('errors.site')): ?>
                                        <small class="text-danger mt-1 d-block"><?= session('errors.site') ?></small>
                                    <?php endif; ?>
                                    <small class="text-danger mt-1 d-block error-message" data-for="site"></small>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="comment-form__input-box mb-0">
                                    <textarea name="mensagem" class="form-control" placeholder="Detalhes do evento ou do projeto (mínimo 20 caracteres)." style="padding: 20px; min-height: 150px;" required minlength="20"><?= old('mensagem') ?></textarea>
                                    <?php if (session('errors.mensagem')): ?>
                                        <small class="text-danger mt-1 d-block"><?= session('errors.mensagem') ?></small>
                                    <?php endif; ?>
                                    <small class="text-danger mt-1 d-block error-message" data-for="mensagem"></small>
                                </div>
                            </div>

                            <div class="col-xl-12 text-start mt-4">
                                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                <button type="submit" class="thm-btn comment-form__btn w-100" style="padding: 18px 0; font-size: 16px; font-weight: 600;">Enviar mensagem</button>
                            </div>
                        </div>
                    </form>

                    <script src="https://www.google.com/recaptcha/api.js?render=6LdnDYgqAAAAAGRKlyI7Asd_W9T2LgsG_8ZGFpoC"></script>
                    <script>
                        grecaptcha.ready(function() {
                            grecaptcha.execute('6LdnDYgqAAAAAGRKlyI7Asd_W9T2LgsG_8ZGFpoC', {action: 'submit'}).then(function(token) {
                                document.getElementById('g-recaptcha-response').value = token;
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.434853968546!2d-46.7024567!3d-23.624592999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce50dc7a5fde29%3A0x6b9001520b7e9f6d!2sAv.%20das%20Na%C3%A7%C3%B5es%20Unidas%2C%2014.171%20-%20Morumbi%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004583-110!5e0!3m2!1spt-BR!2sbr!4v1727325355735!5m2!1spt-BR!2sbr" class="google-map__one" style="border:0; width:100%; height:450px;" allowfullscreen="" loading="lazy"></iframe>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contact-form');
    const messageContainer = document.getElementById('message-container');

    if (form) {
        form.addEventListener('submit', async function (event) {
            event.preventDefault();
            console.log('Formulário interceptado pelo JavaScript.');

            // Limpar mensagens de erro anteriores
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');

            // Validação do lado do cliente
            let isValid = true;
            const requiredFields = ['nome', 'email', 'telefone', 'mensagem'];
            requiredFields.forEach(field => {
                const input = form.elements[field];
                if (!input.value.trim()) {
                    isValid = false;
                    const errorEl = document.querySelector(`[data-for="${field}"]`);
                    if (errorEl) errorEl.textContent = `O campo ${field} é obrigatório.`;
                }
            });

            // Validação específica para e-mail
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(form.elements['email'].value.trim())) {
                isValid = false;
                const errorEmail = document.querySelector('[data-for="email"]');
                if (errorEmail) errorEmail.textContent = 'Por favor, forneça um endereço de e-mail válido.';
            }

            // Validação do comprimento da mensagem
            if (form.elements['mensagem'].value.trim().length < 20) {
                isValid = false;
                const errorMsg = document.querySelector('[data-for="mensagem"]');
                if (errorMsg) errorMsg.textContent = 'A mensagem deve ter pelo menos 20 caracteres.';
            }

            if (!isValid) {
                messageContainer.style.display = 'block';
                messageContainer.style.backgroundColor = '#f8d7da';
                messageContainer.style.color = '#721c24';
                messageContainer.textContent = 'Por favor, corrija os erros no formulário.';
                window.scrollTo({ top: messageContainer.offsetTop - 100, behavior: 'smooth' });
                return;
            }

            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                });

                const data = await response.json();

                if (data.success) {
                    messageContainer.style.display = 'block';
                    messageContainer.style.backgroundColor = '#d4edda';
                    messageContainer.style.color = '#155724';
                    messageContainer.textContent = 'Mensagem enviada com sucesso! Entraremos em contato em breve.';
                    form.reset();
                } else {
                    messageContainer.style.display = 'block';
                    messageContainer.style.backgroundColor = '#f8d7da';
                    messageContainer.style.color = '#721c24';
                    let errorMessages = '';
                    for (let field in data.errors) {
                        errorMessages += `${data.errors[field]}<br>`;
                        const dynamicErrorEl = document.querySelector(`[data-for="${field}"]`);
                        if (dynamicErrorEl) dynamicErrorEl.textContent = data.errors[field];
                    }
                    messageContainer.innerHTML = 'Por favor, corrija os seguintes erros:<br>' + errorMessages;
                }
                window.scrollTo({ top: messageContainer.offsetTop - 100, behavior: 'smooth' });
            } catch (error) {
                console.error('Erro:', error);
                messageContainer.style.display = 'block';
                messageContainer.style.backgroundColor = '#f8d7da';
                messageContainer.style.color = '#721c24';
                messageContainer.textContent = 'Ocorreu um erro ao enviar o formulário. Por favor, tente novamente mais tarde.';
            }
        });
    } else {
        console.error('Formulário não encontrado.');
    }
});
</script>
<?= $this->include('partials/footer') ?>