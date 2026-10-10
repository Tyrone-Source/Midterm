<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="row mt-4">
    <div class="col-md-12">
        <h2>Sales History</h2>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Customer</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Cashier</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales)): ?>
                    <?php foreach ($sales as $sale): ?>
                        <tr>
                            <?= esc($sale['id']) ?>
                            <td><?= esc($sale['product_name'] ?? 'N/A') ?></td>
                            <td><?= esc($sale['customer_name'] ?? 'Walk-in') ?></td>
                            <td><?= esc($sale['quantity']) ?></td>
                            <td>$<?= number_format($sale['total_price'], 2) ?></td>
                            <td><?= esc($sale['cashier_name'] ?? 'Admin') ?></td>
                            <td><?= esc($sale['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No sales recorded yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>