<style>
.form-login {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    background-color: #f9f9f9;
}
.form-login input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
.form-login input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}
.form-login input[type="submit"]:hover {
    background-color: #45a049;
}
.form-login label {
    margin-bottom: 5px;
    display: block;
    font-weight: bold;
}
</style>



<div class="form-login">
    <?= $this->Form->create() ?>
    <?= $this->Form->control("username") ?>
    <?= $this->Form->control("password") ?>
    <?= $this->Form->submit(__('Login')); ?>
    <?= $this->Form->end() ?>
</div>