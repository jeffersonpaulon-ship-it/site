<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Editar Proposta</h1>
                    <form action="<?= site_url('admin/propostas/update/' . $proposta['id']) ?>" method="post">
                        <?= csrf_field() ?>
                    
                        <div class="form-group">
                            <label for="nome_evento">Nome do Evento</label>
                            <input type="text" class="form-control" id="nome_evento" name="nome_evento" value="<?= esc($proposta['nome_evento']) ?>" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="data_evento">Data do Evento</label>
                            <input type="date" class="form-control" id="data_evento" name="data_evento" value="<?= esc($proposta['data_evento']) ?>" required>
                        </div>
                    
                        <!-- Adicione os outros campos da proposta aqui, similar ao formulário de criação -->
                    
                        <h2>Itens da Proposta</h2>
                        <div id="itens-proposta">
                            <?php foreach ($itens as $index => $item): ?>
                            <div class="item-proposta">
                                <div class="form-group">
                                    <label for="produto_servico_id">Produto/Serviço</label>
                                    <select class="form-control" name="itens[<?= $index ?>][produto_servico_id]" required>
                                        <?php foreach ($produtos_servicos as $produto): ?>
                                            <option value="<?= $produto['id'] ?>" <?= $item['produto_servico_id'] == $produto['id'] ? 'selected' : '' ?>><?= esc($produto['nome']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" class="form-control" name="itens[<?= $index ?>][quantidade]" value="<?= esc($item['quantidade']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="dias">Dias</label>
                                    <input type="number" class="form-control" name="itens[<?= $index ?>][dias]" value="<?= esc($item['dias']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="number" step="0.01" class="form-control" name="itens[<?= $index ?>][valor]" value="<?= esc($item['valor']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="custo_locado">Custo Locado</label>
                                    <select class="form-control" name="itens[<?= $index ?>][custo_locado]">
                                        <option value="0" <?= $item['custo_locado'] == 0 ? 'selected' : '' ?>>Não</option>
                                        <option value="1" <?= $item['custo_locado'] == 1 ? 'selected' : '' ?>>Sim</option>
                                    </select>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="btn btn-secondary" id="adicionar-item">Adicionar Item</button>
                    
                        <button type="submit" class="btn btn-primary mt-3">Atualizar Proposta</button>
                    </form>
                    
                    <script>
                        let itemCount = <?= count($itens) ?>;
                        document.getElementById('adicionar-item').addEventListener('click', function() {
                            const itemsContainer = document.getElementById('itens-proposta');
                            const newItem = itemsContainer.children[0].cloneNode(true);
                            const inputs = newItem.getElementsByTagName('input');
                            const selects = newItem.getElementsByTagName('select');
                            
                            for (let input of inputs) {
                                input.name = input.name.replace(/$$\d+$$/, `[${itemCount}]`);
                                input.value = '';
                            }
                            
                            for (let select of selects) {
                                select.name = select.name.replace(/$$\d+$$/, `[${itemCount}]`);
                                select.selectedIndex = 0;
                            }
                            
                            itemsContainer.appendChild(newItem);
                            itemCount++;
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->include('admin/partials/footeradmin') ?>