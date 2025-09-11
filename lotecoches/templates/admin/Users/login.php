

<div class="form-login">
    <?= $this->Form->create() ?>
    
    <?= $this->Form->control('username', [
        'label' => 'Usuario',
        'required' => true
    ]) ?>
    
    <?= $this->Form->control('password', [
        'type' => 'password',
        'label' => 'Contraseña',
        'required' => true
    ]) ?>
    
    <?= $this->Form->button(__('Login')) ?>
    <?= $this->Form->end() ?>
</div>