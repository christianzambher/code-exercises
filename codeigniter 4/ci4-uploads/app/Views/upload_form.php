<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<body>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif ?>

<?php if (session()->getFlashdata('success')): ?>
    <p style="color:green"><?= session()->getFlashdata('success') ?></p>
<?php endif ?>

<form method="post" enctype="multipart/form-data" action="/upload">
    <input type="file" name="file" required>
    <button type="submit">Subir</button>
</form>

</body>
</html>
