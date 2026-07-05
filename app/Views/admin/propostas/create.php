<?= $this->include('admin/partials/headeradmin') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Criar Proposta</h1>
                    <form action="<?= site_url('admin/propostas') ?>" method="post">
                        <?= csrf_field() ?>
                    
                        <div class="form-group">
                            <label for="nome_evento">Nome do Evento</label>
                            <input type="text" class="form-control" id="nome_evento" name="nome_evento" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="data_evento">Data do Evento</label>
                            <input type="date" class="form-control" id="data_evento" name="data_evento" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="local_evento">Local do Evento</label>
                            <input type="text" class="form-control" id="local_evento" name="local_evento" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="endereco_evento">Endereço do Evento</label>
                            <input type="text" class="form-control" id="endereco_evento" name="endereco_evento" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="cidade_evento">Cidade do Evento</label>
                            <input type="text" class="form-control" id="cidade_evento" name="cidade_evento" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="estado_evento">Estado do Evento</label>
                            <input type="text" class="form-control" id="estado_evento" name="estado_evento" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="nome_solicitante">Nome do Solicitante</label>
                            <input type="text" class="form-control" id="nome_solicitante" name="nome_solicitante" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="celular_solicitante">Celular do Solicitante</label>
                            <input type="text" class="form-control" id="celular_solicitante" name="celular_solicitante" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="email_solicitante">Email do Solicitante</label>
                            <input type="email" class="form-control" id="email_solicitante" name="email_solicitante" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="data_entrega">Data de Entrega</label>
                            <input type="date" class="form-control" id="data_entrega" name="data_entrega" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="data_devolucao">Data de Devolução</label>
                            <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="imposto_tipo">Tipo de Imposto</label>
                            <select class="form-control" id="imposto_tipo" name="imposto_tipo">
                                <option value="nota_jeff">Nota Jeff (10%)</option>
                                <option value="nota_top">Nota Top (15%)</option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="tem_bv">Tem BV?</label>
                            <select class="form-control" id="tem_bv" name="tem_bv">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="estacionamento">Estacionamento</label>
                            <input type="number" step="0.01" class="form-control" id="estacionamento" name="estacionamento">
                        </div>
                    
                        <div class="form-group">
                            <label for="frete">Frete</label>
                            <input type="number" step="0.01" class="form-control" id="frete" name="frete">
                        </div>
                    
                        <div class="form-group">
                            <label for="alimentacao">Alimentação</label>
                            <input type="number" step="0.01" class="form-control" id="alimentacao" name="alimentacao">
                        </div>
                    
                        <div class="form-group">
                            <label for="hospedagem">Hospedagem</label>
                            <input type="number" step="0.01" class="form-control" id="hospedagem" name="hospedagem">
                        </div>
                    
                        <div class="form-group">
                            <label for="translado">Translado</label>
                            <input type="number" step="0.01" class="form-control" id="translado" name="translado">
                        </div>
                    
                        <h2>Itens da Proposta</h2>
                        <div id="itens-proposta">
                            <div class="item-proposta">
                                <div class="form-group">
                                    <label for="produto_servico_id">Produto/Serviço</label>
                                    <select class="form-control" name="itens[0][produto_servico_id]" required>
                                        <?php foreach ($produtos_servicos as $produto): ?>
                                            <option value="<?= $produto['id'] ?>"><?= esc($produto['nome']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" class="form-control" name="itens[0][quantidade]" required>
                                </div>
                                <div class="form-group">
                                    <label for="dias">Dias</label>
                                    <input type="number" class="form-control" name="itens[0][dias]" required>
                                </div>
                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="number" step="0.01" class="form-control" name="itens[0][valor]" required>
                                </div>
                                <div class="form-group">
                                    <label for="custo_locado">Custo Locado</label>
                                    <select class="form-control" name="itens[0][custo_locado]">
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" id="adicionar-item">Adicionar Item</button>
                    
                        <button type="submit" class="btn btn-primary mt-3">Criar Proposta</button>
                    </form>
                    
                    <script>
                        let itemCount = 1;
                        document.getElementById('adicionar-item').addEventListener('click', function() {
                            const itemsContainer = document.getElementById('itens-proposta');
                            const newItem = itemsContainer.children[0].cloneNode(true);
                            const inputs = newItem.getElementsByTagName('input');
                            const selects = newItem.getElementsByTagName('select');
                            
                            for (let input of inputs) {
                                input.name = input.name.replace('[0]', `[${itemCount}]`);
                                input.value = '';
                            }
                            
                            for (let select of selects) {
                                select.name = select.name.replace('[0]', `[${itemCount}]`);
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
