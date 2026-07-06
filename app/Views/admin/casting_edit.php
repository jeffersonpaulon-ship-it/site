<?= $this->include('admin/partials/headeradmin') ?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Editar Casting</h1>
                    <form action="<?= base_url('admin/casting/edit/' . $pessoa['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= esc($pessoa['nome']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?= esc($pessoa['sobrenome']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= esc($pessoa['email']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" value="<?= esc($pessoa['celular']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="funcao_pretendida">Função Pretendida</label>
                            <input type="text" class="form-control" id="funcao_pretendida" name="funcao_pretendida" value="<?= esc($pessoa['funcao_pretendida']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= esc($pessoa['data_nascimento']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?= esc($pessoa['endereco']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="<?= esc($pessoa['numero']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?= esc($pessoa['bairro']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="<?= esc($pessoa['cidade']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" id="uf" name="uf" value="<?= esc($pessoa['uf']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="possui_veiculo">Possui Veículo</label>
                            <select class="form-control" id="possui_veiculo" name="possui_veiculo" required>
                                <option value="sim" <?= $pessoa['possui_veiculo'] === 'sim' ? 'selected' : '' ?>>Sim</option>
                                <option value="não" <?= $pessoa['possui_veiculo'] === 'não' ? 'selected' : '' ?>>Não</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idiomas">Idiomas</label>
                            <input type="text" class="form-control" id="idiomas" name="idiomas" value="<?= esc($pessoa['idiomas']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mei">MEI</label>
                            <select class="form-control" id="mei" name="mei" required>
                                <option value="sim" <?= $pessoa['mei'] === 'sim' ? 'selected' : '' ?>>Sim</option>
                                <option value="não" <?= $pessoa['mei'] === 'não' ? 'selected' : '' ?>>Não</option>
                            </select>
                        </div>
                        <div class="form-group" id="cnpj-group" style="display: <?= $pessoa['mei'] === 'sim' ? 'block' : 'none' ?>;">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?= esc($pessoa['cnpj']) ?>">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= esc($pessoa['cpf']) ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="<?= base_url('admin/casting') ?>" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.getElementById('mei').addEventListener('change', function() {
    var cnpjGroup = document.getElementById('cnpj-group');
    if (this.value === 'sim') {
        cnpjGroup.style.display = 'block';
    } else {
        cnpjGroup.style.display = 'none';
    }
});
</script>

<?= $this->include('admin/partials/footeradmin') ?>