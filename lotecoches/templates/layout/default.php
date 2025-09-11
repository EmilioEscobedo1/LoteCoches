<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header class="main-header">
        <div class="logo">
            <h1>Lote de Coches</h1>
        </div>
        <nav class="main-nav">
            <ul>
                <li><?= $this->Html->link('Inicio', '/', ['class' => 'nav-link']) ?></li>
                <li><?= $this->Html->link('Contacto', '#contacto', ['class' => 'nav-link']) ?></li>
                <li><?= $this->Html->link('Iniciar Sesion', ['prefix' => 'Admin', 'controller' => 'Dashboard', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <?= $this->fetch('content') ?>
    </main>
    <footer class="main-footer">
        <p>&copy; <?= date('Y') ?> Lote de Coches - Todos los derechos reservados</p>
    </footer>
</body>
</html>
