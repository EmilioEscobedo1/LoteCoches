<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Categoria $categoria
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Categoria'), ['action' => 'edit', $categoria->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Eliminar Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nueva Categoria'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="categorias view content">
            <h3><?= h($categoria->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($categoria->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($categoria->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Vehiculos relacionados') ?></h4>
                <?php if (!empty($categoria->vehiculos)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Marca') ?></th>
                            <th><?= __('Modelo') ?></th>
                            <th><?= __('Anio') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th><?= __('Kilometraje') ?></th>
                            <th><?= __('Color') ?></th>
                            <th><?= __('Numero De Serie') ?></th>
                            <th><?= __('Categoria Id') ?></th>
                            <th class="actions"><?= __('Acciones') ?></th>
                        </tr>
                        <?php foreach ($categoria->vehiculos as $vehiculo) : ?>
                        <tr>
                            <td><?= h($vehiculo->id) ?></td>
                            <td><?= h($vehiculo->marca) ?></td>
                            <td><?= h($vehiculo->modelo) ?></td>
                            <td><?= h($vehiculo->anio) ?></td>
                            <td><?= h($vehiculo->precio) ?></td>
                            <td><?= h($vehiculo->kilometraje) ?></td>
                            <td><?= h($vehiculo->color) ?></td>
                            <td><?= h($vehiculo->numero_de_serie) ?></td>
                            <td><?= h($vehiculo->categoria_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Vehiculos', 'action' => 'view', $vehiculo->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Vehiculos', 'action' => 'edit', $vehiculo->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Eliminar'),
                                    ['controller' => 'Vehiculos', 'action' => 'delete', $vehiculo->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Seguro que quieres eliminar # {0}?', $vehiculo->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>