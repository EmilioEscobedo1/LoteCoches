<h2>Vehículos disponibles</h2>
<table>
    <tr><th>ID</th><th>Marca</th><th>Modelo</th></tr>
    <?php foreach ($vehiculos as $v): ?>
        <tr>
            <td><?= h($v->id) ?></td>
            <td><?= h($v->marca) ?></td>
            <td><?= h($v->modelo) ?></td>
        </tr>
    <?php endforeach; ?>
</table>