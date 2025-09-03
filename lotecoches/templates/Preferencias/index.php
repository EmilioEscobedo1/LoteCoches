<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Preferencia> $preferencias
 */
?>
<div class="preferencias index content">
    <?= $this->Html->link(__('New Preferencia'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Preferencias') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('id_categoria') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($preferencias as $preferencia): ?>
                <tr>
                    <td><?= $this->Number->format($preferencia->id) ?></td>
                    <td><?= $preferencia->id_categoria === null ? '' : $this->Number->format($preferencia->id_categoria) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $preferencia->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $preferencia->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $preferencia->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $preferencia->id),
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