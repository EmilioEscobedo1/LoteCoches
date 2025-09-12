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
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $sucursale->id],
                ['confirm' => __('Seguro que quieres eliminar esta sucursal # {0}?', $sucursale->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de sucursales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sucursales form content">
            <?= $this->Form->create($sucursale) ?>
            <fieldset>
                <legend><?= __('Editar Sucursal') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('telefono');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Aceptar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
