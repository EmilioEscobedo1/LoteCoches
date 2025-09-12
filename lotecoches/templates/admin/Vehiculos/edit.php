<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vehiculo $vehiculo
 * @var string[]|\Cake\Collection\CollectionInterface $categorias
 * @var string[]|\Cake\Collection\CollectionInterface $sucursals
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $vehiculo->id],
                ['confirm' => __('Seguro que quieres eliminar # {0}?', $vehiculo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de vehiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehiculos form content">
            <?= $this->Form->create($vehiculo, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Editar Vehiculo') ?></legend>
                <?php
                    echo $this->Form->control('marca');
                    echo $this->Form->control('modelo');
                    echo $this->Form->control('anio');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('kilometraje');
                    echo $this->Form->control('color');
                    echo $this->Form->control('numero_de_serie');
                    echo $this->Form->control('categoria_id', ['options' => $categorias, 'empty' => true]);
                    echo $this->Form->control('sucursal_id', ['options' => $sucursals, 'empty' => true]);

                    // Mostrar la imagen actual si existe
                    if (!empty($vehiculo->imagen)) {
                        echo '<div class="current-image">';
                        echo $this->Html->image('uploads/' . $vehiculo->imagen, ['alt' => 'Imagen del vehículo', 'style' => 'max-width:200px;']);
                        echo '</div>';
                    }

                    // Agregar control para subir nueva imagen
                    echo $this->Form->control('imagen', ['type' => 'file', 'label' => 'Subir nueva imagen']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Aceptar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
