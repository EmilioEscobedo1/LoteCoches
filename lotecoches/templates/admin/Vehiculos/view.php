<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehiculo $vehiculo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Vehiculo'), ['action' => 'edit', $vehiculo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Vehiculo'), ['action' => 'delete', $vehiculo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vehiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Vehiculo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehiculos view content">
            <h3><?= h($vehiculo->marca) ?></h3>
            <table>
                <tr>
                    <th><?= __('Marca') ?></th>
                    <td><?= h($vehiculo->marca) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modelo') ?></th>
                    <td><?= h($vehiculo->modelo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Anio') ?></th>
                    <td><?= h($vehiculo->anio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= h($vehiculo->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kilometraje') ?></th>
                    <td><?= h($vehiculo->kilometraje) ?></td>
                </tr>
                <tr>
                    <th><?= __('Color') ?></th>
                    <td><?= h($vehiculo->color) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero De Serie') ?></th>
                    <td><?= h($vehiculo->numero_de_serie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= $vehiculo->hasValue('categoria') ? $this->Html->link($vehiculo->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $vehiculo->categoria->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sucursal') ?></th>
                    <td><?= $vehiculo->hasValue('sucursal') ? $this->Html->link($vehiculo->sucursal->nombre, ['controller' => 'Sucursales', 'action' => 'view', $vehiculo->sucursal->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($vehiculo->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>