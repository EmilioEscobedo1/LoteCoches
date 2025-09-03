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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $preferencia->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $preferencia->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Preferencias'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="preferencias form content">
            <?= $this->Form->create($preferencia) ?>
            <fieldset>
                <legend><?= __('Edit Preferencia') ?></legend>
                <?php
                    echo $this->Form->control('id_categoria');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
