<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sucursale> $sucursales
 */
?>
<div class="sucursales index content">
    <?= $this->Html->link(__('Nueva sucursal'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sucursales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('direccion') ?></th>
                    <th class="actions"><?= $this->Paginator->sort('telefono') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sucursales as $sucursale): ?>
                <tr>
                    <td><?= $this->Number->format($sucursale->id) ?></td>
                    <td><?= h($sucursale->nombre) ?></td>
                    <td><?= h($sucursale->direccion) ?></td>
                    <td><?= h($sucursale->telefono) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $sucursale->id], ['class' => 'btn btn-view']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $sucursale->id], ['class' => 'btn btn-view']) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $sucursale->id], ['class' => 'btn btn-view'],
                            [
                                'method' => 'delete',
                                'confirm' => __('Estas seguro que quieres eliminar # {0}?', $sucursale->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>