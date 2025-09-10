<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <?= $this->Html->css('login') ?> 
</head>
<body>
    <div class="login-container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>