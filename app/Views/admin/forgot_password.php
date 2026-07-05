<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h2>Recuperar Senha</h2>
<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>
<form action="<?= base_url('admin/process-forgot-password') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar Link de Recuperação</button>
</form>
<?= $this->endSection() ?>