<form method="GET" action="/users">
    <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Buscar...">
    <input type="date" name="from" value="<?= esc($from) ?>" placeholder="Fecha">
    <button type="submit">Buscar</button>
</form>

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha de Creación</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= esc($user['name']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td><?= esc($user['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $pager->links() ?>