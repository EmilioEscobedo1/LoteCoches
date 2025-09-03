<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sucursale> $sucursales
 */
?>
<div class="sucursales index content">
    <?= $this->Html->link(__('New Sucursale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sucursales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('direccion') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
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
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sucursale->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sucursale->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $sucursale->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $sucursale->id),
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