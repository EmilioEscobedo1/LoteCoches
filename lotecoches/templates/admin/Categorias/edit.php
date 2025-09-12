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
            <?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $categoria->id],
                ['confirm' => __('Seguro que quieres eliminar # {0}?', $categoria->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Categorias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="categorias form content">
            <?= $this->Form->create($categoria) ?>
            <fieldset>
                <legend><?= __('Editar categoria') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Aceptar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
