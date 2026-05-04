<h1>Login</h1>

<?php if (session('error')): ?>
    <p><?= esc(session('error')) ?></p>
<?php endif ?>

<form method="post" action="/login">
    <?= csrf_field() ?>
    <input name="email" value="<?= old('email') ?>" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button>Entrar</button>
</form>
