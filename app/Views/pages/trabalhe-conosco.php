<?= $this->include('partials/header') ?>
<div class="page-wrapper">
<header class="main-header clearfix">
    <?= $this->include('partials/menu') ?>
</header>
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/trabalhe-conosco-bg.jpg)">
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
                <li class="active">Trabalhe Conosco</li>
            </ul>
            <h1>Trabalhe no Credenciamento Sem Fila</h1>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--contact Page Start-->
<section class="contact-page contact-page-two">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="section-title__title">Preencha o formulário abaixo</h2>
        </div>
        <?php if (session()->has('success')): ?>
            <div class="alert alert-success">
                <?= session('success') ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-xl-12">
                <div class="contact-page__form">
                    <div id="message" class="alert" style="display:none;"></div>
                    <form id="trabalhe-conosco-form" action="<?= base_url('trabalhe-conosco/submit') ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row">

                            <!-- MEI -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="mei">Você é MEI?</label>
                                    <select name="mei" id="mei" class="form-control">
                                        <option value="">Selecione</option>
                                        <option value="sim">Sim</option>
                                        <option value="não">Não</option>
                                    </select>
                                    <?php if (session('errors.mei')): ?>
                                        <small class="text-danger"><?= session('errors.mei') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- CNPJ (aparece se MEI = Sim) -->
                            <div class="col-xl-6 mei-related" style="display:none;">
                                <div class="comment-form__input-box">
                                    <label for="cnpj">CNPJ</label>
                                    <input type="text" placeholder="Seu CNPJ" name="cnpj" value="<?= old('cnpj') ?>" >
                                    <?php if (session('errors.cnpj')): ?>
                                        <small class="text-danger"><?= session('errors.cnpj') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- CPF -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="cpf">CPF</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Seu CPF" maxlength="11" required>
                                    <?php if (session('errors.cpf')): ?>
                                        <small class="text-danger"><?= session('errors.cpf') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Nome -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="nome">Nome</label>
                                    <input type="text" placeholder="Seu nome" name="nome" value="<?= old('nome') ?>" required>
                                    <?php if (session('errors.nome')): ?>
                                        <small class="text-danger"><?= session('errors.nome') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Sobrenome -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input type="text" placeholder="Seu sobrenome" name="sobrenome" value="<?= old('sobrenome') ?>" required>
                                    <?php if (session('errors.sobrenome')): ?>
                                        <small class="text-danger"><?= session('errors.sobrenome') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Apelido -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="apelido">Apelido (opcional)</label>
                                    <input type="text" placeholder="Seu apelido" name="apelido" value="<?= old('apelido') ?>" >
                                </div>
                            </div>

                            <!-- Celular -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="celular">Celular</label>
                                    <input type="text" placeholder="Seu celular" name="celular" value="<?= old('celular') ?>" maxlength="11" minlength="11" required>
                                    <?php if (session('errors.celular')): ?>
                                        <small class="text-danger"><?= session('errors.celular') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="Seu email" name="email" value="<?= old('email') ?>" required>
                                    <?php if (session('errors.email')): ?>
                                        <small class="text-danger"><?= session('errors.email') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Senha -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="senha">Senha</label>
                                    <input type="password" placeholder="Sua senha" name="senha" required>
                                    <?php if (session('errors.senha')): ?>
                                        <small class="text-danger"><?= session('errors.senha') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Data de nascimento -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="date" name="data_nascimento" value="<?= old('data_nascimento') ?>" required>
                                    <?php if (session('errors.data_nascimento')): ?>
                                        <small class="text-danger"><?= session('errors.data_nascimento') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- CEP -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="cep">CEP</label>
                                    <input type="text" id="cep" name="cep" placeholder="Seu CEP" value="<?= old('cep') ?>" maxlength="8" required>
                                    <?php if (session('errors.cep')): ?>
                                        <small class="text-danger"><?= session('errors.cep') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Endereço (auto preenchido via CEP) -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" id="endereco" name="endereco" placeholder="Seu endereço" value="<?= old('endereco') ?>" required>
                                    <?php if (session('errors.endereco')): ?>
                                        <small class="text-danger"><?= session('errors.endereco') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Numero -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="numero">Número</label>
                                    <input type="text" placeholder="Número" name="numero" value="<?= old('numero') ?>" required>
                                    <?php if (session('errors.numero')): ?>
                                        <small class="text-danger"><?= session('errors.numero') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Bairro -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="bairro">Bairro</label>
                                    <input type="text" id="bairro" name="bairro" placeholder="Seu bairro" value="<?= old('bairro') ?>" required>
                                    <?php if (session('errors.bairro')): ?>
                                        <small class="text-danger"><?= session('errors.bairro') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Cidade -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" id="cidade" name="cidade" placeholder="Sua cidade" value="<?= old('cidade') ?>" required>
                                    <?php if (session('errors.cidade')): ?>
                                        <small class="text-danger"><?= session('errors.cidade') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Estado/UF -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="uf">Estado (UF)</label>
                                    <input type="text" id="uf" name="uf" placeholder="Seu estado (UF)" value="<?= old('uf') ?>" required>
                                    <?php if (session('errors.uf')): ?>
                                        <small class="text-danger"><?= session('errors.uf') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Possui Veículo -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="possui_veiculo">Possui Veículo?</label>
                                    <select name="possui_veiculo" class="form-control">
                                        <option value="">Selecione</option>
                                        <option value="sim">Sim</option>
                                        <option value="não">Não</option>
                                    </select>
                                    <?php if (session('errors.possui_veiculo')): ?>
                                        <small class="text-danger"><?= session('errors.possui_veiculo') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Idiomas -->
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <label for="idiomas">Idiomas</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="idiomas[]" value="ingles" id="idiomaIngles">
                                        <label class="form-check-label" for="idiomaIngles">
                                            Inglês
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="idiomas[]" value="espanhol" id="idiomaEspanhol">
                                        <label class="form-check-label" for="idiomaEspanhol">
                                            Espanhol
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="idiomas[]" value="mandarim" id="idiomaMandarim">
                                        <label class="form-check-label" for="idiomaMandarim">
                                            Mandarim
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="idiomas[]" value="frances" id="idiomaFrances">
                                        <label class="form-check-label" for="idiomaFrances">
                                            Francês
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="idiomas[]" value="outro" id="idiomaOutro">
                                        <label class="form-check-label" for="idiomaOutro">
                                            Outro
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Função Pretendida -->
                            <div class="col-xl-12">
                                <div class="comment-form__input-box">
                                    <label for="funcao_pretendida">Função Pretendida</label>
                                    <select name="funcao_pretendida" class="form-control">
                                        <option value="">Selecione</option>
                                        <option value="Recepcionista">Recepcionista</option>
                                        <option value="digitadora">Digitador(a)</option>
                                        <option value="suporte">Suporte</option>
                                        <option value="tecnico">Técnico(a) TI</option>
                                        <option value="coordenador">Coordenador(a)</option>
                                        <option value="outro">Outro(a)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Fotos -->
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="foto_perfil_1">Foto de Perfil (obrigatória)</label>
                                    <input type="file" name="foto_perfil_1" required>
                                    <?php if (session('errors.foto_perfil_1')): ?>
                                        <small class="text-danger"><?= session('errors.foto_perfil_1') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="foto_perfil_2">Foto de Perfil</label>
                                    <input type="file" name="foto_perfil_2">
                                    <?php if (session('errors.foto_perfil_2')): ?>
                                        <small class="text-danger"><?= session('errors.foto_perfil_2') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="foto_corpo_inteiro_1">Foto de Corpo Inteiro (obrigatória)</label>
                                    <input type="file" name="foto_corpo_inteiro_1" required>
                                    <?php if (session('errors.foto_corpo_inteiro_1')): ?>
                                        <small class="text-danger"><?= session('errors.foto_corpo_inteiro_1') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="foto_corpo_inteiro_2">Foto de Corpo Inteiro</label>
                                    <input type="file" name="foto_corpo_inteiro_2">
                                    <?php if (session('errors.foto_corpo_inteiro_2')): ?>
                                        <small class="text-danger"><?= session('errors.foto_corpo_inteiro_2') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="foto_corpo_inteiro_3">Foto de Corpo Inteiro</label>
                                    <input type="file" name="foto_corpo_inteiro_3">
                                    <?php if (session('errors.foto_corpo_inteiro_3')): ?>
                                        <small class="text-danger"><?= session('errors.foto_corpo_inteiro_3') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label for="foto_corpo_inteiro_4">Foto de Corpo Inteiro</label>
                                    <input type="file" name="foto_corpo_inteiro_4">
                                    <?php if (session('errors.foto_corpo_inteiro_4')): ?>
                                        <small class="text-danger"><?= session('errors.foto_corpo_inteiro_4') ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Campos adicionais -->
                            <div class="col-xl-12">
                                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                <button type="submit" class="thm-btn comment-form__btn">Enviar</button>
                            </div>

                        </div>
                    </form>

                    <!-- reCAPTCHA Script -->
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
<!--contact Page End-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('trabalhe-conosco-form');
            const messageDiv = document.getElementById('message');

            // Função para validar o formulário
            function validateForm() {
                const requiredFields = ['nome', 'sobrenome', 'email', 'senha', 'cpf', 'celular', 'data_nascimento', 'cep'];
                let isValid = true;

                requiredFields.forEach(field => {
                    const input = form.querySelector(`[name="${field}"]`);
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add('is-invalid');
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });

                return isValid;
            }

            // Evento de submit do formulário
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                if (!validateForm()) {
                    messageDiv.style.display = 'block';
                    messageDiv.className = 'alert alert-danger';
                    messageDiv.textContent = 'Por favor, preencha todos os campos obrigatórios.';
                    return;
                }

                const formData = new FormData(form);

                // Log para debug
                console.log('Formulário submetido');
                console.log('FormData:', Object.fromEntries(formData));

                fetch(form.action, {
                    method: form.method,
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro na resposta do servidor: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    messageDiv.style.display = 'block';
                    if (data.success) {
                        messageDiv.className = 'alert alert-success';
                        messageDiv.textContent = data.message;
                        form.reset();
                    } else {
                        messageDiv.className = 'alert alert-danger';
                        let errorMessage = 'Erro ao enviar o formulário:';
                        for (const field in data.errors) {
                            errorMessage += `\n${field}: ${data.errors[field]}`;
                        }
                        messageDiv.textContent = errorMessage;
                        console.error(data.errors);
                    }
                })
                .catch(error => {
                    messageDiv.style.display = 'block';
                    messageDiv.className = 'alert alert-danger';
                    messageDiv.textContent = 'Ocorreu um erro ao enviar o formulário: ' + error.message;
                    console.error('Erro:', error);
                });
            });

            // Verificação de CPF existente
            document.getElementById('cpf').addEventListener('blur', function() {
                const cpf = this.value;
                if (cpf.length === 11) {
                    fetch('<?= base_url('trabalhe-conosco/checkCpf') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({ cpf: cpf })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            alert('Usuário já cadastrado. Redirecionando para a tela de login.');
                            window.location.href = '<?= base_url('login') ?>';
                        }
                    })
                    .catch(error => console.error('Erro:', error));
                }
            });

            // Busca de CEP
            document.getElementById('cep').addEventListener('blur', function() {
                const cep = this.value.replace(/\D/g, '');
                if (cep.length === 8) {
                    const url = `https://viacep.com.br/ws/${cep}/json/`;
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            if (!data.erro) {
                                document.getElementById('endereco').value = data.logradouro;
                                document.getElementById('bairro').value = data.bairro;
                                document.getElementById('cidade').value = data.localidade;
                                document.getElementById('uf').value = data.uf;
                            } else {
                                alert('CEP não encontrado.');
                                clearAddressFields();
                            }
                        })
                        .catch(error => {
                            console.error('Erro ao buscar o CEP:', error);
                            alert('Erro ao buscar o CEP. Por favor, tente novamente.');
                            clearAddressFields();
                        });
                } else {
                    alert('CEP inválido.');
                    clearAddressFields();
                }
            });

            function clearAddressFields() {
                ['endereco', 'bairro', 'cidade', 'uf'].forEach(id => {
                    document.getElementById(id).value = '';
                });
            }

            // Mostrar/esconder campo CNPJ baseado na seleção de MEI
            document.getElementById('mei').addEventListener('change', function() {
                const cnpjField = document.querySelector('.mei-related');
                cnpjField.style.display = this.value === 'sim' ? 'block' : 'none';
            });
        });
    </script>
<?= $this->include('partials/footer') ?>