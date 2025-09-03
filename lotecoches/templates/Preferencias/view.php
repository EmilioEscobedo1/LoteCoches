<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Preferencia $preferencia
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Preferencia'), ['action' => 'edit', $preferencia->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Preferencia'), ['action' => 'delete', $preferencia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $preferencia->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Preferencias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Preferencia'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="preferencias view content">
            <h3><?= h($preferencia->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($preferencia->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Categoria') ?></th>
                    <td><?= $preferencia->id_categoria === null ? '' : $this->Number->format($preferencia->id_categoria) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>