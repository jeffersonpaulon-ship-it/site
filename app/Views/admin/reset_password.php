<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<h2>Redefinir Senha</h2>
<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form action="<?= base_url('admin/process-reset-password') ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="token" value="<?= $token ?>">
    <div class="form-group">
        <label for="password">Nova Senha</label>
        <input type="password" name="password" id="password" required class="form-control">
    </div>
    <div class="form-group">
        <label for="password_confirm">Confirmar Nova Senha</label>
        <input type="password" name="password_confirm" id="password_confirm" required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Redefinir Senha</button>
</form>
<?= $this->endSection() ?>

