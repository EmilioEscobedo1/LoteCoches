<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehiculo> $vehiculos
 */
?>
<div class="vehiculos index content">
    <?= $this->Html->link(__('Nuevo vehiculo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vehiculos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="thead"><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('marca') ?></th>
                    <th><?= $this->Paginator->sort('modelo') ?></th>
                    <th><?= $this->Paginator->sort('anio') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('kilometraje') ?></th>
                    <th><?= $this->Paginator->sort('color') ?></th>
                    <th><?= $this->Paginator->sort('numero_de_serie') ?></th>
                    <th><?= $this->Paginator->sort('categoria_id') ?></th>
                    <th><?= $this->Paginator->sort('sucursal_id') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehiculos as $vehiculo): ?>
                <tr>
                    <td><?= $this->Number->format($vehiculo->id) ?></td>
                    <td><?= h($vehiculo->marca) ?></td>
                    <td><?= h($vehiculo->modelo) ?></td>
                    <td><?= h($vehiculo->anio) ?></td>
                    <td><?= h($vehiculo->precio) ?></td>
                    <td><?= h($vehiculo->kilometraje) ?></td>
                    <td><?= h($vehiculo->color) ?></td>
                    <td><?= h($vehiculo->numero_de_serie) ?></td>
                    <td><?= $vehiculo->hasValue('categoria') ? $this->Html->link($vehiculo->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $vehiculo->categoria->id]) : '' ?></td>
                    <td><?= $vehiculo->hasValue('sucursal') ? $this->Html->link($vehiculo->sucursal->nombre, ['controller' => 'Sucursales', 'action' => 'view', $vehiculo->sucursal->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $vehiculo->id], ['class' => 'btn btn-view']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $vehiculo->id], ['class' => 'btn btn-view']) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $vehiculo->id], ['class' => 'btn btn-view'],
                            [
                                'method' => 'delete',
                                'confirm' => __('Estas seguro que quieres eliminar # {0}?', $vehiculo->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>