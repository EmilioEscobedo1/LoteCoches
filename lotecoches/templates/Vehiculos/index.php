<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Vehiculo> $vehiculos
 */
?>
<div class="vehiculos index content">
    <?= $this->Html->link(__('New Vehiculo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vehiculos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('marca') ?></th>
                    <th><?= $this->Paginator->sort('modelo') ?></th>
                    <th><?= $this->Paginator->sort('anio') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('kilometraje') ?></th>
                    <th><?= $this->Paginator->sort('color') ?></th>
                    <th><?= $this->Paginator->sort('numero_de_serie') ?></th>
                    <th><?= $this->Paginator->sort('categoria_id') ?></th>
                    <th><?= $this->Paginator->sort('sucursal_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
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
                        <?= $this->Html->link(__('View'), ['action' => 'view', $vehiculo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiculo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $vehiculo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $vehiculo->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>