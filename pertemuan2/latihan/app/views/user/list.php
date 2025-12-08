<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
</head>
<body>
<div class="container mt-3">
    <h1><?= $data['judul']; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                Add New User
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Pengguna</h3>
            <ul class="list-group">
                <?php foreach ($data['users'] as $user): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?= $user['name']; ?> (<?= $user['email']; ?>)
                        <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="badge bg-primary text-decoration-none">Detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= BASEURL; ?>/user/add" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>
