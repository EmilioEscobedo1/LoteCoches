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
            <?= $this->Html->link(__('List Correos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="correos form content">
            <?= $this->Form->create($correo) ?>
            <fieldset>
                <legend><?= __('Add Correo') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('correo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
