<?= $this->include('layout') ?>
<?= $this->section('content') ?>
<h2>Add New Product</h2>
<form action="/products" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Price</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stock Quantity</label>
        <input type="number" name="stock_quantity" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Product Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save Product</button>
</form>
<?= $this->endSection() ?>