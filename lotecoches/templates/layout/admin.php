<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= $this->Url->build('/css/admin.css') ?>">
</head>
<body>
    <header>
        <h1>Dashboard Admin</h1>
        <nav>
            <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index', 'prefix' => 'Admin']) ?>">Home</a>
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">Logout</a>
        </nav>
    </header>

    <main>
        <?= $this->fetch('content') ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> LoteCoches</p>
    </footer>
</body>
</html>