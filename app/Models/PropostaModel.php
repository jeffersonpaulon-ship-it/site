<?php

namespace App\Models;

use CodeIgniter\Model;

class PropostaModel extends Model
{
    protected $table = 'propostas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['numero', 'nome_evento', 'data_evento', 'local_evento', 'endereco_evento', 'cidade_evento', 'estado_evento', 'nome_solicitante', 'celular_solicitante', 'email_solicitante', 'data_entrega', 'data_devolucao', 'imposto_tipo', 'tem_bv', 'estacionamento', 'frete', 'alimentacao', 'hospedagem', 'translado'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function gerarNumeroProposta()
    {
        $ano = date('y');
        $ultimaProposta = $this->selectMax('id')->where('YEAR(created_at)', date('Y'))->first();
        $proximoId = $ultimaProposta ? $ultimaProposta['id'] + 1 : 1;
        return $ano . '-' . str_pad($proximoId, 4, '0', STR_PAD_LEFT);
    }
}