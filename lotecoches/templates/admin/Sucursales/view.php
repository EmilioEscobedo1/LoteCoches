<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sucursale $sucursale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Sucursal'), ['action' => 'edit', $sucursale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Sucursal'), ['action' => 'delete', $sucursale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sucursale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Sucursales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Sucursal'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sucursales view content">
            <h3><?= h($sucursale->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($sucursale->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Direccion') ?></th>
                    <td><?= h($sucursale->direccion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($sucursale->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sucursale->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>