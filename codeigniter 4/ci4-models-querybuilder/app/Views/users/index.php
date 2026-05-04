<h1>Usuarios</h1>

<ul>
    <?php foreach ($users as $user): ?>
        <li><?= esc($user['name']) ?> - <?= esc($user['email']) ?></li>
    <?php endforeach ?>
</ul>
