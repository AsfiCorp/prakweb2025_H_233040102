<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
</head>
<body>
    <div class="container mt-5">
        <h3>Detail Pengguna</h3>
        <ul>
            <li>Nama: <?= htmlspecialchars($data['user']['name']); ?></li>
            <li>Email: <?= htmlspecialchars($data['user']['email']); ?></li>
        </ul>
        <a href="<?= BASEURL; ?>/user" class="btn btn-primary">Kembali</a>
    </div>
</body>
</html>
