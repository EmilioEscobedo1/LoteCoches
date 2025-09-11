<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users view content">
    <h3><?= h($user->username) ?></h3>

    <table>
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($user->nombre ?? '') ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email ?? '') ?></td>
        </tr>
        <tr>
            <th><?= __('Admin') ?></th>
            <td><?= $user->admin ? __('Sí') : __('No') ?></td>
        </tr>
        <tr>
            <th><?= __('ID') ?></th>
            <td><?= $user->id !== null ? $this->Number->format($user->id) : '' ?></td>
        </tr>
    </table>

    <div class="actions">
        <?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $user->id], ['class' => 'button']) ?>
        <?= $this->Form->postLink(__('Eliminar Usuario'), ['action' => 'delete', $user->id], ['confirm' => __('¿Estás seguro de eliminar este usuario?'), 'class' => 'button']) ?>
        <?= $this->Html->link(__('Lista de Usuarios'), ['action' => 'index'], ['class' => 'button']) ?>
    </div>
</div>