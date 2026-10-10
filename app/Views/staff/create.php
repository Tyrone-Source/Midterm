<?= $this->include('layout') ?>
<?= $this->section('content') ?>
<h2>Add New Staff User</h2>
<form action="/staff" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Full Name</label>
        <input type="text" name="full_name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Avatar</label>
        <input type="file" name="avatar" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save Staff</button>
</form>
<?= $this->endSection() ?>