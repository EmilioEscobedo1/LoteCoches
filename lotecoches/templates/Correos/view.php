<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Correo $correo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Correo'), ['action' => 'edit', $correo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Correo'), ['action' => 'delete', $correo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $correo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Correos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Correo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="correos view content">
            <h3><?= h($correo->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($correo->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($correo->correo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($correo->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>