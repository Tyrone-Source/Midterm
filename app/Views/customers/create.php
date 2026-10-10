<?= $this->include('layout') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Customers Management</h2>
    <a href="/customers/new" class="btn btn-primary">Add Customer</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($customers as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['full_name'] ?></td>
            <td><?= $c['email'] ?></td>
            <td><?= $c['phone'] ?></td>
            <td>
                <a href="/customers/<?= $c['id'] ?>/edit" class="btn btn-sm btn-warning">Edit</a>
                <form action="/customers/<?= $c['id'] ?>" method="post" class="d-inline">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>