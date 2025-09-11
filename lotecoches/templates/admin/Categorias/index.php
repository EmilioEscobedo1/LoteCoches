<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Categoria> $categorias
 */
?>
<div class="categorias index content">
    <?= $this->Html->link(__('Nueva categoria'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Categorias') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
        <tbody>
    <?php foreach ($categorias as $categoria): ?>
    <tr>
        <td><?= $categoria->id !== null ? $this->Number->format($categoria->id) : '' ?></td>
        <td><?= h($categoria->nombre) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('Ver'), ['action' => 'view', $categoria->id], ['class' => 'btn btn-view']) ?>
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $categoria->id], ['class' => 'btn btn-view']) ?>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $categoria->id], ['class' => 'btn btn-view'],
                [
                    'method' => 'delete',
                    'confirm' => __('Estas seguro que quieres eliminar # {0}?', $categoria->id),
                ]
            ) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
        </table>
    </div>
</div>