<div class="main-container">
    <?= $this->Html->link('Volver al inicio', '/', ['class' => 'nav-link']) ?>
    <?= $this->Flash->render() ?>
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
        
        <?= $this->Form->button(__('Login'), ['type' => 'submit']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>