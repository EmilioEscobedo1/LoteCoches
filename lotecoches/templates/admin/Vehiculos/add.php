<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Vehiculos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="vehiculos form content">
            <?= $this->Form->create($vehiculo, ['type' => 'file']) ?>
<fieldset>
    <legend><?= __('Añadir vehiculo') ?></legend>
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
                    echo $this->Form->control('imagen', ['type' => 'file']); // <-- control de archivo
                ?>
            </fieldset>
            <?= $this->Form->button(__('Aceptar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>