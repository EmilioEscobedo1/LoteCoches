<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        ConnectionManager::get($name)->getDriver()->connect();
        // No exception means success
        $connected = true;
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/5/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Lote de Coches - Bienvenido
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border-radius: 5px;
            max-width: 600px;
            width: 90%;
            position: relative;
        }
        .close {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
$this->assign('title', 'Inicio');
?>
<div class="container">

    <header class="main-header">
        <div class="logo">
            <h1>Lote de Coches</h1>
        </div>
        <nav class="main-nav">
            <ul>
                <li><?= $this->Html->link('Inicio', '/', ['class' => 'nav-link']) ?></li>
                <li><?= $this->Html->link('Vehículos', ['controller' => 'Vehiculos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
                <li><?= $this->Html->link('Contacto', '#contacto', ['class' => 'nav-link']) ?></li>
            </ul>
        </nav>
    </header>
    <section class="vehiculos-preview">
        <h2>Nuestros Vehículos</h2>
        <div class="vehiculos-grid">
            <?php if (!empty($vehiculos)): ?>
                <?php foreach ($vehiculos as $vehiculo): ?>
                    <div class="vehiculo-card">
                        <img src="<?= $vehiculo->imagen ?: '/img/car-placeholder.webp' ?>" alt="<?= h($vehiculo->marca) ?>">
                        <h3><?= h($vehiculo->marca) ?> <?= h($vehiculo->modelo) ?></h3>
                        <p>Año: <?= h($vehiculo->anio) ?></p>
                        <p>Precio: <?= h($vehiculo->precio) ?></p>
                        <a href="javascript:void(0);" class="button" onclick="openModal('modal-<?= $vehiculo->id ?>')">Ver más</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay vehículos disponibles en este momento.</p>
            <?php endif; ?>
        </div>
        <div class="text-center">
            <?= $this->Html->link('Ver todos los vehículos', ['controller' => 'Vehiculos', 'action' => 'index'], ['class' => 'button']) ?>
        </div>
    </section>

    <?php if (!empty($vehiculos)): ?>
        <?php foreach ($vehiculos as $vehiculo): ?>
            <div id="modal-<?= $vehiculo->id ?>" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal('modal-<?= $vehiculo->id ?>')">&times;</span>
                    <h2><?= h($vehiculo->marca) ?> <?= h($vehiculo->modelo) ?></h2>
                    <img src="<?= $vehiculo->imagen ?: '/img/car-placeholder.webp' ?>" alt="<?= h($vehiculo->marca) ?>">
                    <p>Año: <?= h($vehiculo->anio) ?></p>
                    <p>Kilometraje: <?= h($vehiculo->kilometraje) ?></p>
                    <p>Color: <?= h($vehiculo->color) ?></p>
                    <p>Precio: <?= h($vehiculo->precio) ?></p>
                    <p>Número de serie: <?= h($vehiculo->numero_de_serie) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <footer class="main-footer">
        <p>&copy; <?= date('Y') ?> Lote de Coches - Todos los derechos reservados</p>
    </footer>

</div>

<script>
function openModal(id) {
    document.getElementById(id).style.display = 'flex';
}
function closeModal(id) {
    document.getElementById(id).style.display = 'none';
}
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}
</script>

</body>
</html>
