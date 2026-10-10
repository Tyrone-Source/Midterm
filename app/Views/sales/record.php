<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="row mt-4">
    <div class="col-md-6 offset-md-3">
        <h2>Record New Sale</h2>
        <hr>
        <form action="/sales/record" method="post">
            <div class="mb-3">
                <label for="product_id" class="form-label">Select Product</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    <option value="">-- Choose Product --</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?= $product['id'] ?>" data-price="<?= $product['price'] ?>">
                            <?= $product['name'] ?> ($<?= $product['price'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="customer_id" class="form-label">Select Customer</label>
                <select name="customer_id" id="customer_id" class="form-control">
                    <option value="">-- Walk-in Customer --</option>
                    <?php foreach ($customers as $customer): ?>
                        <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" required>
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price ($)</label>
                <input type="text" name="total_price" id="total_price" class="form-control" readonly required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Complete Sale</button>
        </form>
    </div>
</div>

<script>
    // Simple script to auto-calculate total price based on product and quantity
    const productSelect = document.getElementById('product_id');
    const quantityInput = document.getElementById('quantity');
    const totalPriceInput = document.getElementById('total_price');

    function calculateTotal() {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
        const qty = parseInt(quantityInput.value) || 0;
        totalPriceInput.value = (price * qty).toFixed(2);
    }

    productSelect.addEventListener('change', calculateTotal);
    quantityInput.addEventListener('input', calculateTotal);
</script>
<?= $this->endSection() ?>