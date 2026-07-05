<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Editar Produto/Serviço</h1>
                    <form action="<?= site_url('admin/produtos-servicos/update/' . $produto_servico['id']) ?>" method="post">
                        <?= csrf_field() ?>
        
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= esc($produto_servico['nome']) ?>" required>
                        </div>
        
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?= esc($produto_servico['descricao']) ?></textarea>
                        </div>
        
                        <div class="form-group">
                            <label for="preco_diaria">Preço Diária</label>
                            <input type="number" step="0.01" class="form-control" id="preco_diaria" name="preco_diaria" value="<?= esc($produto_servico['preco_diaria']) ?>" required>
                        </div>
        
                        <div class="form-group">
                            <label for="preco_3_dias">Preço 3 Dias</label>
                            <input type="number" step="0.01" class="form-control" id="preco_3_dias" name="preco_3_dias" value="<?= esc($produto_servico['preco_3_dias']) ?>" required>
                        </div>
        
                        <div class="form-group">
                            <label for="preco_5_dias">Preço 5 Dias</label>
                            <input type="number" step="0.01" class="form-control" id="preco_5_dias" name="preco_5_dias" value="<?= esc($produto_servico['preco_5_dias']) ?>" required>
                        </div>
        
                        <div class="form-group">
                            <label for="preco_7_dias">Preço 7 Dias</label>
                            <input type="number" step="0.01" class="form-control" id="preco_7_dias" name="preco_7_dias" value="<?= esc($produto_servico['preco_7_dias']) ?>" required>
                        </div>
        
                        <div class="form-group">
                            <label for="preco_10_dias">Preço 10 Dias</label>
                            <input type="number" step="0.01" class="form-control" id="preco_10_dias" name="preco_10_dias" value="<?= esc($produto_servico['preco_10_dias']) ?>" required>
                        </div>
        
                        <div class="form-group">
                            <label for="ano_utilizacao">Ano de Utilização</label>
                            <input type="number" class="form-control" id="ano_utilizacao" name="ano_utilizacao" value="<?= esc($produto_servico['ano_utilizacao']) ?>" required>
                        </div>
        
                        <div class="form-group">
                            <label for="custo_proprio">Custo Próprio</label>
                            <input type="number" step="0.01" class="form-control" id="custo_proprio" name="custo_proprio" value="<?= esc($produto_servico['custo_proprio']) ?>" required>
                        </div>
        
                        <div class="form-group">
                            <label for="custo_locado">Custo Locado</label>
                            <input type="number" step="0.01" class="form-control" id="custo_locado" name="custo_locado" value="<?= esc($produto_servico['custo_locado']) ?>" required>
                        </div>
        
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="<?= site_url('admin/produtos-servicos') ?>" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>