<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <?= $this->Html->css('admin') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="admin-dashboard">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>LoteCoches</h2>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index', 'prefix' => 'Admin']) ?>">Dashboard</a></li>
                    <li><a href="<?= $this->Url->build(['controller' => 'Vehiculos', 'action' => 'index', 'prefix' => 'Admin']) ?>">Vehículos</a></li>
                    <li><a href="<?= $this->Url->build(['controller' => 'Categorias', 'action' => 'index', 'prefix' => 'Admin']) ?>">Categorías</a></li>
                    <li><a href="<?= $this->Url->build(['controller' => 'Sucursales', 'action' => 'index', 'prefix' => 'Admin']) ?>">Sucursales</a></li>
                    <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index', 'prefix' => 'Admin']) ?>">Usuarios</a></li>
                    <li><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout', 'prefix' => 'Admin']) ?>">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <section class="main-content">
            <header class="main-header">
                <h1>Dashboard Admin</h1>
            </header>

            <div class="content-area">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </section>
    </div>
</body>
</html>