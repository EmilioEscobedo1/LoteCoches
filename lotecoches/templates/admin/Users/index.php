</instructions>
<content>
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="admin-content">
    <?= $this->Html->link(__('Nuevo usuario'), ['action' => 'add'], ['class' => 'button btn-primary float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('correo') ?></th>
                    <th><?= $this->Paginator->sort('admin') ?></th>
                    <th class="admin-actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nombre) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->correo) ?></td>
                    <td><?= $this->Number->format($user->admin) ?></td>
                    <td class="admin-actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class' => 'btn btn-view']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-edit']) ?>
                        <?= $this->Form->postLink(
                            __('Eliminar'),
                            ['action' => 'delete', $user->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Estas seguro que quieres eliminar # {0}?', $user->id),
                                'class' => 'btn btn-delete'
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</content>
</oboe.edit_file>
