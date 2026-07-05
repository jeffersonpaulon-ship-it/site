<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'noreply@credenciamentosemfila.com.br';
    public string $fromName   = 'Credenciamento Sem Fila';

    public string $userAgent = 'CodeIgniter';

    // Configuração do protocolo
    public string $protocol = 'smtp';

    // Caminho para o sendmail (não utilizado no SMTP)
    //public string $mailPath = '/usr/sbin/sendmail';

    // Configuração SMTP
    public string $SMTPHost = 'mail.smtp2go.com';
    public string $SMTPUser = 'noreply@credenciamentosemfila.com.br';
    public string $SMTPPass = 'CsF!74#30Rl';
    public int $SMTPPort = 587;  // Porta para TLS (ou use 465 para SSL)
    public string $SMTPCrypto = 'tls';  // Use 'tls' para a porta 587 ou 'ssl' para a porta 465
    public int $SMTPTimeout = 5;
    public bool $SMTPKeepAlive = false;

    // Configurações do e-mail
    public bool $wordWrap = true;
    public int $wrapChars = 76;
    public string $mailType = 'html';
    public string $charset = 'UTF-8';
    public bool $validate = false;

    // Configurações de prioridade e quebra de linha
    public int $priority = 3;
    public string $CRLF = "\r\n";
    public string $newline = "\r\n";

    // BCC e notificações
    public bool $BCCBatchMode = false;
    public int $BCCBatchSize = 200;
    public bool $DSN = false;
}