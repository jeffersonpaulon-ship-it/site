<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <!-- Adicione seus estilos CSS aqui -->
</head>
<body>
    <header>
        <!-- Adicione o cabeçalho do seu painel admin aqui -->
    </header>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        <!-- Adicione o rodapé do seu painel admin aqui -->
    </footer>

    <!-- Adicione seus scripts JS aqui -->
</body>
</html>